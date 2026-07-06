import * as esbuild from 'esbuild'

async function compile(options) {
    const context = await esbuild.context(options)
    await context.rebuild()
    await context.dispose()
}

compile({
    define: { 'process.env.NODE_ENV': `'production'` },
    bundle: true,
    mainFields: ['module', 'main'],
    platform: 'neutral',
    sourcemap: false,
    treeShaking: true,
    target: ['es2020'],
    minify: true,
    entryPoints: ['./resources/js/filament/rich-content-plugins/heading-id.js'],
    outfile: './resources/js/dist/filament/rich-content-plugins/heading-id.js',
})