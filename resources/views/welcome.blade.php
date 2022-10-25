<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google</title>
    <link rel="icon" href="{{asset('asset/images/favicon.png')}} ">
    <link rel="stylesheet" href="{{asset('asset/style.css')}} ">
    <script src="https://kit.fontawesome.com/b0f29e9bfe.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
<!-- Header -->
<header>
    <nav class="navbar">
        <ul>
            <li>
                <a class="link" href="https://mail.google.com">{{__('msg.gmail')}}</a>
            </li>
            <li>
                <a class="link" href="https://www.google.com/imghp?hl=en&ogbl">{{__('msg.images')}}</a>
            </li>
            <li>
                <div class="circle-shadow svg-app">
                    <svg class="gb_Ue" focusable="false" viewBox="0 0 24 24">
                        <path
                            d="M6,8c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM12,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM6,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM6,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM12,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM16,6c0,1.1 0.9,2 2,2s2,-0.9 2,-2 -0.9,-2 -2,-2 -2,0.9 -2,2zM12,8c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM18,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM18,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2z"></path>
                    </svg>
                </div>
            </li>
            <li>
                <div class="circle-shadow">
                    <a class="user-icon" href="https://accounts.google.com/"><span>J</span></a>
                </div>
            </li>
        </ul>
    </nav>
</header>

<!-- Content -->
<section class="content-section">
    <div class="content-wrapper">
        <img class="logo-img" src=" {{asset('asset/images/logo.png')}}" alt="Google Logo Image">
        <div class="search-bar">
            <form action="{{ route('search_name') }}" method="get" class="search-form">
                @csrf
                <button type="submit" name="search" class="search-btn" onclick="search()">
                    <i class="fas fa-search"></i>
                </button>
                {{--                oninput="handleOnChange(this.value)"--}}
                <input id="search-input" class="search-input" type="search" name="search"
                       oninput="handleOnChange(this.value)" autocomplete="off" required min="2">
            </form>
            <svg class="goxjub" focusable="false" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24px">
                <path fill="#4285f4"
                      d="m12 15c1.66 0 3-1.31 3-2.97v-7.02c0-1.66-1.34-3.01-3-3.01s-3 1.34-3 3.01v7.02c0 1.66 1.34 2.97 3 2.97z"></path>
                <path fill="#34a853" d="m11 18.08h2v3.92h-2z"></path>
                <path fill="#fbbc05"
                      d="m7.05 16.87c-1.27-1.33-2.05-2.83-2.05-4.87h2c0 1.45 0.56 2.42 1.47 3.38v0.32l-1.15 1.18z"></path>
                <path fill="#ea4335"
                      d="m12 16.93a4.97 5.25 0 0 1 -3.54 -1.55l-1.41 1.49c1.26 1.34 3.02 2.13 4.95 2.13 3.87 0 6.99-2.92 6.99-7h-1.99c0 2.92-2.24 4.93-5 4.93z"></path>
            </svg>
            <img src=" {{asset('asset/images/photo.svg')}} " style="margin: 10px" width="24px" alt="">
        </div>
        <ul id="result-list"></ul>
        <div class="search-btns">
            <button class="google-search-btn">{{__('msg.google_search')}}</button>
            <button class="lucky-search-btn">{{__('msg.felling')}}</button>
        </div>
        <div class="language">
            <p>{{__('msg.service')}}
                <a href="/hy">հայերեն</a>
                <a href="/ru">русский</a>
            </p>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="footer-content upper-footer">
        <p>{{__('msg.Armenia')}}</p>
    </div>
    <div class="footer-content lower-footer">
        <ul class="lower-left-footer">
            <li>
                <a href="https://about.google/?utm_source=google-AM&utm_medium=referral&utm_campaign=hp-footer&fg=1">{{__('msg.about')}}</a>
            </li>
            <li>
                <a href="https://ads.google.com/intl/en/home/?subid=ww-ww-et-g-awa-a-g_hpafoot1_1!o2&utm_source=google.com&utm_medium=referral&utm_campaign=google_hpafooter&fg=1">{{__('msg.advertising')}}</a>
            </li>
            <li>
                <a href="https://www.google.com/services/?subid=ww-ww-et-g-awa-a-g_hpbfoot1_1!o2&utm_source=google.com&utm_medium=referral&utm_campaign=google_hpbfooter&fg=1#?modal_active=none">{{__('msg.business')}}</a>
            </li>
            <li>
                <a href="https://www.google.com/search/howsearchworks/?fg=1">{{__('msg.works')}}</a>
            </li>
        </ul>
        <ul class="lower-right-footer">
            <li>
                <a href="https://policies.google.com/privacy?hl=en-AM&fg=1">{{__('msg.privacy')}}</a>
            </li>
            <li>
                <a href="https://policies.google.com/terms?hl=en-AM&fg=1">{{__('msg.terms')}}</a>
            </li>
            <li>
                <a href="">{{__('msg.settings')}}</a>
            </li>
        </ul>
    </div>
</footer>
</body>
<script src="{{asset('asset/index.js')}}"></script>
</html>
