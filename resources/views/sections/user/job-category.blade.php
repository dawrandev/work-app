<section class="job-category section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <span class="wow fadeInDown" data-wow-delay=".2s">{{__('Job Category')}}</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">{{__('Choose Your Desire Category')}}</h2>
                </div>
            </div>
        </div>
        <div class="cat-head">
            <div class="row">
                @foreach (getCategories() as $category)
                <div class="col-lg-3 col-md-6 col-12">
                    <a href="{{ route('categories.show', $category->id) }}" class="single-cat wow fadeInUp" data-wow-delay=".2s">
                        <div class="icon">
                            <i class="{{ $category->icon }}"></i>
                        </div>
                        <h3>{{ $category->translated_name }}</h3>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>