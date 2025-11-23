<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 animate-fade-in-up">
                آراء عملائنا
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto animate-fade-in">
                ما يقوله عملاؤنا عن خدماتنا
            </p>
        </div>
        
        <div class="max-w-6xl mx-auto" 
             x-data="{
                currentSlide: 0,
                testimonials: [
                    {
                        name: 'أحمد محمد',
                        role: 'مدير شركة التقنية',
                        content: 'خدمة ممتازة وفريق محترف. ساعدونا على تحقيق أهدافنا بشكل سريع وفعال. أنصح الجميع بالتعامل معهم.',
                        image: '👨‍💼'
                    },
                    {
                        name: 'فاطمة علي',
                        role: 'رائدة أعمال',
                        content: 'تجربة رائعة من البداية للنهاية. فريق عمل متعاون وخدمات عالية الجودة. نتائج تفوق التوقعات.',
                        image: '👩‍💼'
                    },
                    {
                        name: 'خالد حسن',
                        role: 'مدير التسويق',
                        content: 'حلول مبتكرة وذكية ساعدتنا على تطوير أعمالنا بشكل كبير. فريق محترف وذو خبرة عالية.',
                        image: '👨‍💻'
                    },
                    {
                        name: 'سارة أحمد',
                        role: 'مديرة المشاريع',
                        content: 'دعم مستمر واهتمام بالتفاصيل. سعداء جداً بالنتائج والخدمة المقدمة. شكراً لكم على المجهود الرائع.',
                        image: '👩‍💻'
                    }
                ],
                next() {
                    this.currentSlide = (this.currentSlide + 1) % this.testimonials.length;
                },
                prev() {
                    this.currentSlide = (this.currentSlide - 1 + this.testimonials.length) % this.testimonials.length;
                }
             }"
             x-init="setInterval(() => next(), 5000)">
            
            <div class="relative">
                <!-- Testimonial cards -->
                <div class="overflow-hidden">
                    <div class="flex transition-transform duration-500 ease-in-out"
                         :style="`transform: translateX(-${currentSlide * 100}%)`">
                        <template x-for="(testimonial, index) in testimonials" :key="index">
                            <div class="min-w-full px-4">
                                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-8 md:p-12 rounded-2xl shadow-lg text-center max-w-3xl mx-auto">
                                    <div class="text-6xl mb-6">
                                        <span x-text="testimonial.image"></span>
                                    </div>
                                    <p class="text-lg md:text-xl text-gray-700 mb-8 leading-relaxed italic" x-text="testimonial.content">
                                    </p>
                                    <div>
                                        <h4 class="text-xl font-bold text-gray-900" x-text="testimonial.name"></h4>
                                        <p class="text-blue-600 mt-2" x-text="testimonial.role"></p>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                
                <!-- Navigation arrows -->
                <button @click="next()" 
                        class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white p-3 rounded-full shadow-lg hover:bg-blue-50 transition-all duration-300 z-10"
                        aria-label="التالي">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button @click="prev()" 
                        class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white p-3 rounded-full shadow-lg hover:bg-blue-50 transition-all duration-300 z-10"
                        aria-label="السابق">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                
                <!-- Dots indicator -->
                <div class="flex justify-center gap-2 mt-8">
                    <template x-for="(testimonial, index) in testimonials" :key="index">
                        <button @click="currentSlide = index"
                                class="w-3 h-3 rounded-full transition-all duration-300"
                                :class="currentSlide === index ? 'bg-blue-600 w-8' : 'bg-gray-300'">
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</section>

<?php /**PATH C:\Users\HP\Desktop\landing_page\resources\views/components/testimonials.blade.php ENDPATH**/ ?>