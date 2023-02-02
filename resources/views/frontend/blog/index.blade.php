@extends('frontend.master')
@section('main_content')
@section('title')
Blog | Smart Tech
@endsection


<!-- breadcrumb-area -->
<section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                      <h2 class="title"> All Blogs </h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb__wrap__icon">
        <ul>
            <li><img src="{{ asset("frontend/assets/img/icons/breadcrumb_icon01.png") }}" alt=""></li>
            <li><img src="{{ asset("frontend/assets/img/icons/breadcrumb_icon02.png") }}" alt=""></li>
            <li><img src="{{ asset("frontend/assets/img/icons/breadcrumb_icon03.png") }}" alt=""></li>
            <li><img src="{{ asset("frontend/assets/img/icons/breadcrumb_icon04.png") }}" alt=""></li>
            <li><img src="{{ asset("frontend/assets/img/icons/breadcrumb_icon05.png") }}" alt=""></li>
            <li><img src="{{ asset("frontend/assets/img/icons/breadcrumb_icon06.png") }}" alt=""></li>
        </ul>
    </div>
</section>
<!-- breadcrumb-area-end -->


<!-- blog-area -->
<section class="standard__blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @foreach($allblogs as $item)
                <div class="standard__blog__post">
                    <div class="standard__blog__thumb">
                        <a href="{{ route('blog.details',$item->id) }}"><img src="{{ asset($item->blog_image) }}" alt=""></a>
                        <a href="{{ route('blog.details',$item->id) }}" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                    </div>
                    
                    <div class="standard__blog__content">
                        <div class="blog__post__avatar">
                            <div class="thumb"><img src="{{ asset($item->blog_image) }}" alt=""></div>
                            <span class="post__by">By : 
                                @foreach($categories as $cat)
                                <a>{{

                                   
                                      $cat->id == $item->blog_category_id ? $cat->blog_category : '' 
                                    

                                    }}                                    
                                </a>
                                @endforeach
                            </span>
                        </div>
                        <h2 class="title"><a href="{{ route('blog.details',$item->id) }}">{{ $item->blog_title }}</a></h2>
                        <p>{!! Str::limit($item->blog_description, 200) !!} </p>
                        <ul class="blog__post__meta">
                            <li><i class="fal fa-calendar-alt"></i> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</li>
                            
                        </ul>
                    </div>                    
                </div>
                @endforeach
                
                <div class="pagination-wrap">
                    {{ $allblogs->links() }}
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="blog__sidebar">
                    <div class="widget">
                        <form action="#" class="search-form">
                            <input type="text" placeholder="Search">
                            <button type="submit"><i class="fal fa-search"></i></button>
                        </form>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Blog List</h4>
                        <ul class="rc__post">

                            @foreach($allblogs as $all )
                            <li class="rc__post__item">
                                <div class="rc__post__thumb">
                                    <a href="blog-details.html"><img src="{{ asset($all->blog_image) }} " alt=""></a>
                                </div>
                                <div class="rc__post__content">
                                    <h5 class="title"><a href="blog-details.html">{{ $all->blog_title }}
                                     </a></h5>
                                    <span class="post-date"><i class="fal fa-calendar-alt"></i> {{ Carbon\Carbon::parse($all->created_at)->diffForHumans() }} </span>
                                </div>
                            </li>
                            @endforeach                            
                        </ul>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Categories</h4>
                        <ul class="sidebar__cat">
                            @foreach($categories as $cat)
                            <li class="sidebar__cat__item"><a href="{{ route('category.blog',$cat->id) }}">{{ $cat->blog_category  }}  </a></li>
                            @endforeach                           
                        </ul>
                    </div>
                    
                    <div class="widget">
                        <h4 class="widget-title">Popular Tags</h4>
                        <ul class="sidebar__tags">
                            @foreach($allblogs as $item)
                            <li>{{ $item->blog_tags }}</li>
                            @endforeach
                            
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- blog-area-end -->


<div>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br>
</div>

<!-- contact-area -->
<section class="homeContact">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title">07 - Say hello</span>
                        <h2 class="title">Any questions? Feel free <br> to contact</h2>
                    </div>
                    <div class="homeContact__content">
                        <p>We are always available to help you in any way possible. Please don't hesitate to reach us.</p>
                        <h2 class="mail"><a href="mailto:Info@webmail.com">Info@smartech.com</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form method="post" action="{{ route('store.message') }}">
                            @csrf
                            
                            @error('name')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <input type="text" name="name" placeholder="Enter name*">
                            
                            @error('email')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <input type="email" name="email" placeholder="Enter email*">
                            
                            @error('subject')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <input type="text" name="subject" placeholder="Enter subject*">
                            
                            @error('phone')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <input type="phone" name="phone" placeholder="Enter phone*">
                            
                            @error('message')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <textarea name="message" name="message" placeholder="Enter Massage*"></textarea>
                            <button type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-area-end -->

@endsection