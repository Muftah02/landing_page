<footer id="contact" class="bg-gray-900 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">
            <!-- Contact Information -->
            <div>
                <h3 class="text-2xl font-bold mb-6 animate-fade-in-up">
                    تواصل معنا
                </h3>
                <p class="text-gray-300 mb-6 leading-relaxed animate-fade-in">
                    نحن هنا لمساعدتك. لا تتردد في التواصل معنا عبر البريد الإلكتروني أو ملء النموذج أدناه.
                </p>
                <div class="space-y-4 animate-fade-in">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>info@domain.com</span>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div x-data="contactForm()">
                <h3 class="text-2xl font-bold mb-6 animate-fade-in-up">أرسل رسالة</h3>
                
                <!-- Success Message -->
                <div x-show="success" 
                     x-cloak
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="mb-6 p-4 bg-green-500 text-white rounded-lg">
                    <p>شكراً لك! تم إرسال رسالتك بنجاح وسنرد عليك قريباً.</p>
                </div>
                
                <!-- Error Message -->
                <div x-show="error" 
                     x-cloak
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="mb-6 p-4 bg-red-500 text-white rounded-lg">
                    <p x-text="error"></p>
                </div>
                
                <form @submit.prevent="submitForm()" class="space-y-6">
                    <!-- Honeypot field (spam protection) -->
                    <input type="text" name="website" x-model="formData.website" class="hidden" tabindex="-1" autocomplete="off">
                    
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium mb-2">الاسم</label>
                        <input type="text" 
                               id="name" 
                               x-model="formData.name"
                               class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-white"
                               required>
                        <template x-if="errors.name && errors.name[0]">
                            <p class="mt-1 text-sm text-red-400" x-text="errors.name[0]"></p>
                        </template>
                    </div>
                    
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium mb-2">البريد الإلكتروني</label>
                        <input type="email" 
                               id="email" 
                               x-model="formData.email"
                               class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-white"
                               required>
                        <template x-if="errors.email && errors.email[0]">
                            <p class="mt-1 text-sm text-red-400" x-text="errors.email[0]"></p>
                        </template>
                    </div>
                    
                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-medium mb-2">الرسالة</label>
                        <textarea id="message" 
                                  x-model="formData.message"
                                  rows="5"
                                  class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-white resize-none"
                                  required></textarea>
                        <template x-if="errors.message && errors.message[0]">
                            <p class="mt-1 text-sm text-red-400" x-text="errors.message[0]"></p>
                        </template>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" 
                            :disabled="submitting"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed">
                        <span x-show="!submitting" x-cloak>إرسال الرسالة</span>
                        <span x-show="submitting" x-cloak>جاري الإرسال...</span>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Bottom Bar -->
        <div class="border-t border-gray-800 pt-8 mt-8 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} جميع الحقوق محفوظة</p>
        </div>
    </div>
</footer>

@push('scripts')
<script>
function contactForm() {
    return {
        formData: {
            name: '',
            email: '',
            message: '',
            website: ''
        },
        submitting: false,
        success: false,
        error: false,
        errors: {},
        async submitForm() {
            this.submitting = true;
            this.success = false;
            this.error = false;
            this.errors = {};
            
            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]');
                const token = csrfToken ? csrfToken.getAttribute('content') : '';
                
                const response = await fetch('/contact', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify(this.formData)
                });
                
                const data = await response.json();
                
                if (data.success) {
                    this.success = true;
                    this.formData = { name: '', email: '', message: '', website: '' };
                    setTimeout(() => {
                        this.success = false;
                    }, 5000);
                } else {
                    this.error = data.message || 'حدث خطأ أثناء إرسال الرسالة';
                    this.errors = data.errors || {};
                }
            } catch (err) {
                this.error = 'حدث خطأ أثناء إرسال الرسالة. يرجى المحاولة مرة أخرى.';
            } finally {
                this.submitting = false;
            }
        }
    };
}
</script>
@endpush
