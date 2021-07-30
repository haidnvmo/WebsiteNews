@extends('layouts.frontend')
        <main id="project-wrapper">
            <section class="section-project">
                <div class="section-project-head">
                    <div class="container-master">
                        <h1 class="project-title">{{ $category->name }}</h1>
                    </div>
                </div>
                <div class="section-project-content">
                    @foreach ($post as $value)
                        <div class="box-item">
                            <a href="{{ route('home.detail', $value->slug) }}" class="item imgc" title="">
                                <span>{{ $value->title }}</span>
                                <img src="{{ asset('storage/avatars/'.$value->image )}}" alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="container-master">
                    <div class="section-pagination">
                        {{ $post->links() }}
                    </div>
                </div>
            </section>
        </main>
  

    

        


       

   
