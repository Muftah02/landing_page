<section id="features" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 animate-fade-in-up">
                مميزاتنا
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto animate-fade-in">
                نقدم لك مجموعة متنوعة من الحلول والخدمات المميزة
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
                $features = [
                    [
                        'icon' => '<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>',
                        'title' => 'سرعة عالية',
                        'description' => 'أداء سريع وموثوق لضمان تجربة مستخدم ممتازة'
                    ],
                    [
                        'icon' => '<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>',
                        'title' => 'آمن ومحمي',
                        'description' => 'حماية كاملة لبياناتك ومعلوماتك الشخصية'
                    ],
                    [
                        'icon' => '<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 16a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-3zM14 16a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1h-4a1 1 0 01-1-1v-3z"></path></svg>',
                        'title' => 'متجاوب بالكامل',
                        'description' => 'يعمل بشكل مثالي على جميع الأجهزة والشاشات'
                    ],
                    [
                        'icon' => '<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                        'title' => 'جودة عالية',
                        'description' => 'معايير عالية للجودة والدقة في كل التفاصيل'
                    ]
                ];
            @endphp
            
            @foreach($features as $index => $feature)
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-fade-in-up"
                     style="animation-delay: {{ $index * 100 }}ms; animation-fill-mode: both;">
                    <div class="text-blue-600 mb-4">
                        {!! $feature['icon'] !!}
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                        {{ $feature['title'] }}
                    </h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $feature['description'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

