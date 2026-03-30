<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>جمع الدورات التعليمية من يوتيوب</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-surface font-cairo">

    {{-- Navbar --}}
    <nav class="bg-dark py-3 px-8 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <span class="w-9 h-9 rounded-lg bg-brand flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24"
                    fill="currentColor">
                    <path
                        d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0C.488 3.45.029 5.804 0 12c.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0C23.512 20.55 23.971 18.196 24 12c-.029-6.185-.484-8.549-4.385-8.816zM9 16V8l8 4-8 4z" />
                </svg>
            </span>
            <span class="text-white font-bold text-base">YouTube Course Scraper</span>
        </div>
        <span class="text-gray-400 text-sm">أداة جمع الدورات التعليمية</span>
    </nav>

    {{-- Hero --}}
    <div class="bg-dark pt-14 pb-16 text-center">
        <h1 class="text-white text-4xl font-black mb-3 tracking-tight">جمع الدورات التعليمية من يوتيوب</h1>
        <p class="text-gray-400 text-base">أدخل التصنيفات واضغط ابدأ – النظام سيجمع الدورات تلقائياً باستخدام الذكاء
            الاصطناعي</p>
    </div>

    {{-- Main --}}
    <div class="max-w-5xl mx-auto px-4 -mt-8">

        {{-- Scraper Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-10 animate-slide-up">
            <div class="flex gap-5">
                <div class="flex-1">
                    <label class="block text-sm text-gray-500 mb-2 text-right">أدخل التصنيفات (كل تصنيف في سطر
                        جديد)</label>
                    <textarea id="categoriesInput" rows="7"
                        class="w-full border border-gray-200 rounded-xl p-3 text-right text-gray-700 text-sm resize-none focus:outline-none focus:ring-2 focus:ring-brand/30 focus:border-brand transition-all"
                        placeholder="التسويق&#10;البرمجة&#10;الجرافيكس&#10;الهندسة&#10;ادارة الاعمال">التسويق
البرمجة
الجرافيكس
الهندسة
ادارة الاعمال</textarea>
                </div>

                <div class="flex flex-col gap-3 justify-start pt-6 min-w-[160px]">
                    <button id="startBtn"
                        class="bg-brand hover:bg-brand-dark text-white font-bold rounded-xl py-3 px-5 flex items-center justify-center gap-2 transition-all hover:scale-[1.02]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                        </svg>
                        ابدأ الجمع
                    </button>
                    <button id="stopBtn"
                        class="bg-white border border-gray-200 hover:border-brand hover:text-brand text-gray-500 font-bold rounded-xl py-3 px-5 flex items-center justify-center gap-2 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <rect x="6" y="6" width="12" height="12" rx="2" />
                        </svg>
                        إيقاف
                    </button>
                </div>
            </div>

            {{-- Progress --}}
            <div id="progressBar" class="hidden mt-4">
                <div class="flex justify-between text-xs text-gray-400 mb-1">
                    <span id="progressLabel">جاري الجمع...</span>
                    <span id="progressPct">0%</span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-2">
                    <div id="progressFill" class="bg-brand h-2 rounded-full transition-all duration-500"
                        style="width:0%"></div>
                </div>
            </div>
        </div>

        {{-- Discovered Courses --}}
        <div>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-black text-gray-900">الدورات المكتشفة</h2>
                <span class="text-sm text-gray-400">تم العثور على 127 دورة في 5 تصنيفات</span>
            </div>

            {{-- Filters --}}
            <div class="flex flex-wrap gap-2 mb-6" id="filterTabs">
                <button data-filter="all" class="filter-btn active">الكل (127)</button>
                <button data-filter="marketing" class="filter-btn">التسويق (32)</button>
                <button data-filter="programming" class="filter-btn">البرمجة (45)</button>
                <button data-filter="graphics" class="filter-btn">الجرافيكس (50)</button>
                <button data-filter="engineering" class="filter-btn">الهندسة (0)</button>
                <button data-filter="business" class="filter-btn">ادارة الاعمال (0)</button>
            </div>

            {{-- Cards Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
                @foreach ($courses as $course)
                    <div class="course-card bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden transition-all duration-200 hover:-translate-y-1 hover:shadow-brand"
                        data-category="{{ $course['category'] }}">
                        <div class="relative">
                            <div class="h-36 w-full bg-gradient-to-br from-gray-200 to-gray-100"></div>
                            <span
                                class="absolute top-2 right-2 bg-brand text-white text-xs font-bold px-2 py-0.5 rounded-lg">{{ $course['lessons'] }}
                                درس</span>
                            <span
                                class="absolute bottom-2 right-2 bg-dark text-white text-xs font-semibold px-2 py-0.5 rounded-lg">{{ $course['duration'] }}</span>
                        </div>
                        <div class="p-3">
                            <h3 class="font-bold text-gray-900 text-sm text-right leading-snug mb-2">
                                {{ $course['title'] }}</h3>
                            <p class="text-gray-400 text-xs text-right mb-2">{{ $course['channel'] }}</p>
                            <div class="flex items-center justify-between">
                                <span class="tag tag-{{ $course['category'] }}">{{ $course['category_label'] }}</span>
                                <span class="text-gray-400 text-xs">{{ $course['views'] }} مشاهدة</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="flex items-center justify-center gap-2 pb-12">
                <button class="page-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn">4</button>
                <span class="page-btn border-0 cursor-default text-gray-300">...</span>
                <button class="page-btn">11</button>
                <button class="page-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </div>
        </div>

    </div>

</body>

</html>
