const { Extension } = window.FilamentRichEditor.tiptap.core
const { Plugin, PluginKey } = window.FilamentRichEditor.tiptap.pmState

function slugify(text) {
    return text.toLowerCase().trim()
        .replace(/[^\w\s-]/g, '')
        .replace(/\s+/g, '-')
}

export default Extension.create({
    name: 'headingId',

    addGlobalAttributes() {
        return [
            {
                types: ['heading'],
                attributes: {
                    id: {
                        default: null,
                        parseHTML: element => element.getAttribute('id'),
                        renderHTML: attributes => attributes.id ? { id: attributes.id } : {},
                    },
                },
            },
        ]
    },

    addProseMirrorPlugins() {
        return [
            new Plugin({
                key: new PluginKey('headingId'),
                appendTransaction: (transactions, oldState, newState) => {
                    if (!transactions.some(tr => tr.docChanged)) return null

                    let tr = newState.tr
                    const seen = new Set()
                    let modified = false

                    newState.doc.descendants((node, pos) => {
                        if (node.type.name === 'heading') {
                            let slug = slugify(node.textContent) || 'heading'
                            let unique = slug
                            let i = 2
                            while (seen.has(unique)) unique = `${slug}-${i++}`
                            seen.add(unique)

                            if (node.attrs.id !== unique) {
                                tr.setNodeMarkup(pos, undefined, { ...node.attrs, id: unique })
                                modified = true
                            }
                        }
                    })

                    return modified ? tr : null
                },
            }),
        ]
    },
})