@if($faqs->isNotEmpty())
<section class="faq-section" aria-labelledby="faq-heading">
    <h2 id="faq-heading">Frequently Asked Questions</h2>
    <div>
        @foreach($faqs as $faq)
            <div class="faq-item">
                <h3 class="faq-item__question">{{ $faq->question }}</h3>
                <div class="faq-item__answer">{!! $faq->answer !!}</div>
            </div>
        @endforeach
    </div>
</section>
@endif
