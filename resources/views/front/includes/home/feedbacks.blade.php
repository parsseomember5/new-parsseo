<section class="testimonials-section section-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="common-heading text-center mb-30">
						<span class="tagline">
							<i class="fas fa-plus"></i> {{$feedbacksSetting->feedbacks_uptitle}}
							<span class="heading-shadow-text">{{$feedbacksSetting->feedbacks_uptitle}}</span>
						</span>
                    <h2 class="title">{{$feedbacksSetting->feedbacks_title}}</h2>
                </div>
                <div class="testimonial-boxes">
                    @php $feedbacks = \App\Models\Feedback::where('locale',$locale)->take($feedbacksSetting->feedbacks_count)->get(); @endphp
                    @foreach($feedbacks as $feedback)
                    @include('front.items.feedback',[$feedback])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
