<x-layout title="Contact Us" meta_description="Contact Us" meta_keywords="Contact Us">
    {{-- <x-breadcrumb title="Contact us" /> --}}

    <section class="contact-page py-3">
        <div class="container">
            <h4 class="text-center">Contact Us</h4>
            {{-- Top Section --}}
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <small>Call 24HR / 7Days</small>
                        <a href="tel:">+91-1234567890</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <small>Call 24HR / 7Days</small>
                        <a href="mailto:help@makhana.co.in">help@makhana.co.in</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <address>
                            H1-102(A), Riico Industrial Area, Mansarovar, Jaipur, Rajasthan, 302020
                        </address>
                    </div>
                </div>
            </div>

            {{-- Bottom Section --}}
            <div class="bottom-section mt-4">
                <div class="d-flex flex-column align-items-center">
                    <h4>Message Us</h4>
                    <p>We’ll get back to you within 24 hours</p>
                </div>

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <x-input-field label="Name" icon="fa-solid fa-user" id="name" type="text"
                        placeholder="Enter Your Name" />
                    <x-input-field label="Phone Number" icon="fa-solid fa-phone" id="phone" type="tel"
                        placeholder="Enter Your Number" />
                    <x-input-field label="Email" icon="fa-solid fa-envelope" id="email" type="email"
                        placeholder="Enter Your Email" />

                    <div class="mb-4">
                        <label for="message">Message</label>
                        <div class="position-relative">
                            <div class="input-icon">
                                <i class="fa-solid fa-comments"></i>
                            </div>
                            <textarea name="message" id="message" rows="3" placeholder="Enter Your Message"></textarea>
                            @error('message')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </section>
</x-layout>