@extends('frontend.layouts.main')

@section('metatitle')
    <meta name="title"       content="404 - الصفحة غير موجودة | {{ $VSPVar['siteName'] ?? config('app.name') }}" />
    <meta name="description" content="عذراً، الصفحة التي تبحث عنها غير موجودة." />
    <meta name="robots"      content="noindex,nofollow" />
@endsection

@section('style')
<style>
    /* ── 404 Page ─────────────────────────────────────────────────────────── */
    .error-404-section {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #f0f2ff 0%, #ffffff 60%, #e8f4ff 100%);
        padding: 60px 0;
        position: relative;
        overflow: hidden;
    }

    /* background decoration */
    .error-404-section::before {
        content: '';
        position: absolute;
        width: 500px; height: 500px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(90,73,248,0.06) 0%, transparent 70%);
        top: -100px; right: -100px;
        pointer-events: none;
    }
    .error-404-section::after {
        content: '';
        position: absolute;
        width: 350px; height: 350px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(66,165,245,0.07) 0%, transparent 70%);
        bottom: -80px; left: -80px;
        pointer-events: none;
    }

    .error-404-wrapper {
        text-align: center;
        position: relative;
        z-index: 2;
        max-width: 620px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* big 404 number */
    .error-404-number {
        font-size: clamp(100px, 18vw, 180px);
        font-weight: 900;
        line-height: 1;
        background: linear-gradient(135deg, var(--primary, #5a49f8), var(--accent, #42a5f5));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 8px;
        letter-spacing: -4px;
        position: relative;
        display: inline-block;
    }

    /* floating dot decoration */
    .error-404-number::after {
        content: '●';
        position: absolute;
        bottom: 10px;
        right: -20px;
        font-size: 20px;
        -webkit-text-fill-color: var(--accent, #42a5f5);
        animation: bounce-dot 2s ease-in-out infinite;
    }

    @keyframes bounce-dot {
        0%, 100% { transform: translateY(0); }
        50%       { transform: translateY(-12px); }
    }

    .error-404-icon {
        font-size: 64px;
        margin-bottom: 16px;
        animation: float-icon 3s ease-in-out infinite;
        display: block;
    }
    @keyframes float-icon {
        0%, 100% { transform: translateY(0) rotate(-5deg); }
        50%       { transform: translateY(-10px) rotate(5deg); }
    }

    .error-404-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--primary-darker, #1a1a6e);
        margin-bottom: 12px;
    }

    .error-404-desc {
        color: #6b7280;
        font-size: 1.05rem;
        line-height: 1.8;
        margin-bottom: 36px;
    }

    .error-404-actions {
        display: flex;
        gap: 12px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-404-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, var(--primary, #5a49f8), var(--primary-dark, #3d30d4));
        color: #fff !important;
        padding: 13px 28px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none !important;
        transition: all 0.3s ease;
        box-shadow: 0 6px 20px rgba(90,73,248,0.3);
    }
    .btn-404-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 28px rgba(90,73,248,0.4);
        color: #fff !important;
    }

    .btn-404-secondary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #fff;
        color: var(--primary, #5a49f8) !important;
        padding: 12px 28px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none !important;
        border: 2px solid var(--primary, #5a49f8);
        transition: all 0.3s ease;
    }
    .btn-404-secondary:hover {
        background: var(--primary, #5a49f8);
        color: #fff !important;
        transform: translateY(-3px);
    }

    /* quick links */
    .error-404-links {
        margin-top: 48px;
        padding-top: 32px;
        border-top: 1px solid rgba(90,73,248,0.12);
    }
    .error-404-links p {
        color: #9ca3af;
        font-size: 0.9rem;
        margin-bottom: 16px;
    }
    .error-404-links-grid {
        display: flex;
        gap: 10px;
        justify-content: center;
        flex-wrap: wrap;
    }
    .error-404-link-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 16px;
        border-radius: 50px;
        background: rgba(90,73,248,0.07);
        color: var(--primary, #5a49f8) !important;
        font-size: 0.88rem;
        font-weight: 500;
        text-decoration: none !important;
        transition: all 0.25s;
    }
    .error-404-link-chip:hover {
        background: var(--primary, #5a49f8);
        color: #fff !important;
        transform: translateY(-2px);
    }

    /* search box */
    .error-404-search {
        margin-top: 28px;
        display: flex;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
        border-radius: 50px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    }
    .error-404-search input {
        flex: 1;
        border: 2px solid rgba(90,73,248,0.2);
        border-right: none;
        border-radius: 50px 0 0 50px;
        padding: 11px 20px;
        font-size: 0.95rem;
        outline: none;
        color: #333;
        background: #fff;
    }
    .error-404-search input:focus {
        border-color: var(--primary, #5a49f8);
    }
    .error-404-search button {
        background: var(--primary, #5a49f8);
        color: #fff;
        border: none;
        padding: 11px 22px;
        border-radius: 0 50px 50px 0;
        cursor: pointer;
        font-size: 1rem;
        transition: background 0.25s;
    }
    .error-404-search button:hover {
        background: var(--primary-dark, #3d30d4);
    }

    /* RTL fix */
    [dir="rtl"] .error-404-search input {
        border-right: 2px solid rgba(90,73,248,0.2);
        border-left: none;
        border-radius: 0 50px 50px 0;
    }
    [dir="rtl"] .error-404-search button {
        border-radius: 50px 0 0 50px;
    }
</style>
@endsection

@section('content')

<section class="error-404-section">
    <div class="container">
        <div class="error-404-wrapper" data-aos="fade-up" data-aos-duration="600">

            {{-- Icon --}}
            <span class="error-404-icon">🔍</span>

            {{-- Big number --}}
            <div class="error-404-number">404</div>

            {{-- Title --}}
            <h1 class="error-404-title">
                {{ app()->getLocale() === 'ar' ? 'عذراً! الصفحة غير موجودة' : 'Oops! Page Not Found' }}
            </h1>

            {{-- Description --}}
            <p class="error-404-desc">
                {{ app()->getLocale() === 'ar'
                    ? 'يبدو أن الصفحة التي تبحث عنها قد نُقلت أو حُذفت أو لم تكن موجودة أصلاً. تأكد من الرابط أو ارجع للصفحة الرئيسية.'
                    : 'The page you are looking for might have been moved, deleted, or never existed. Check the URL or go back to the homepage.'
                }}
            </p>

            {{-- Action Buttons --}}
            <div class="error-404-actions">
                <a href="{{ url('/') }}" class="btn-404-primary">
                    <i class="fas fa-home"></i>
                    {{ app()->getLocale() === 'ar' ? 'الصفحة الرئيسية' : 'Go Home' }}
                </a>
                <a href="javascript:history.back()" class="btn-404-secondary">
                    <i class="fas fa-arrow-right"></i>
                    {{ app()->getLocale() === 'ar' ? 'العودة للخلف' : 'Go Back' }}
                </a>
            </div>

            {{-- Search box --}}
            <form class="error-404-search mt-4"
                  action="{{ url('/') }}"
                  method="GET">
                <input
                    type="text"
                    name="search"
                    placeholder="{{ app()->getLocale() === 'ar' ? 'ابحث في الموقع...' : 'Search the site...' }}"
                    autocomplete="off"
                />
                <button type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            {{-- Quick Links --}}
            <div class="error-404-links">
                <p>{{ app()->getLocale() === 'ar' ? 'أو تصفح الأقسام الرئيسية:' : 'Or browse main sections:' }}</p>
                <div class="error-404-links-grid">
                    <a href="{{ url('/') }}"          class="error-404-link-chip"><i class="fas fa-home"></i>        {{ app()->getLocale() === 'ar' ? 'الرئيسية'    : 'Home'     }}</a>
                    <a href="{{ url('/products') }}"  class="error-404-link-chip"><i class="fas fa-th-large"></i>    {{ app()->getLocale() === 'ar' ? 'المشاريع'    : 'Projects' }}</a>
                    <a href="{{ url('/articles') }}"  class="error-404-link-chip"><i class="fas fa-newspaper"></i>   {{ app()->getLocale() === 'ar' ? 'الأخبار'     : 'News'     }}</a>
                    <a href="{{ url('/contact') }}"   class="error-404-link-chip"><i class="fas fa-envelope"></i>    {{ app()->getLocale() === 'ar' ? 'تواصل معنا'  : 'Contact'  }}</a>
                    <a href="{{ url('/donate') }}"    class="error-404-link-chip"><i class="fas fa-hand-holding-heart"></i> {{ app()->getLocale() === 'ar' ? 'تبرع الآن' : 'Donate' }}</a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
