<div class="checkout-container">
    <div class="checkout-wrapper">

        {/* Left Column: Checkout Form */}
        <div class="checkout-left-container">
            <div class="checkout-left-wrapper">

                {/* Header */}
                <div class="checkout-left-header">
                    <div>
                        <h2>Shipping Details</h2>
                        <p>Where should we send your order?</p>
                    </div>
                </div>

                {/* Form Body */}
                <div className="p-4">
                    <div className="input-container">

                        <InputField id="fullName" name="fullName" label="Full Name" placeholder="Abhishek Kumar"
                            icon="userIcon" />

                        <InputField id="phone" name="phone" type="tel" label="Phone Number"
                            placeholder="+1 (555) 000-0000" icon="phoneIcon" />

                        <div className="md:col-span-2">
                            <InputField id="addressLine" name="addressLine" label="Address"
                                placeholder="Street address, Apartment, Suite, etc." icon="pinIcon" />
                        </div>

                        <div className="md:col-span-1">
                            <InputField id="city" name="city" label="City" placeholder="New York"
                                icon="buildingIcon" />
                        </div>

                        <div className="row g-4">
                            <InputField id="state" name="state" label="State" placeholder="NY"
                                class="col-6 col-md-12" />
                            <InputField id="pincode" name="pincode" label="Pincode" placeholder="10001"
                                class="col-6 col-md-12" />
                        </div>

                    </div>

                    <div className="mt-5 pt-3 border-top bg-secondary">
                        <button className="checkout-btn">
                            <i class="fa-solid fa-lock"></i>
                            Proceed to Payment
                            <ArrowRightIcon />
                        </button>
                        <p className="text-center text-slate-400 text-sm mt-4 flex items-center justify-center gap-1">
                            <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            Your information is encrypted and secure
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {/* Right Column: Order Summary (Visual Context) */}
        <div className="d-none d-lg-block">
            <div className="bg-white rounded-2xl shadow-lg border border-slate-100 p-8 sticky top-8">
                <h3 className="text-lg font-bold text-slate-900 mb-6">Order Summary</h3>

                <div className="space-y-6">
                    <div className="flex items-center gap-4">
                        <div className="w-16 h-16 bg-slate-100 rounded-lg flex items-center justify-center">
                            <img src="https://picsum.photos/64/64" alt="Product" className="rounded-lg" />
                        </div>
                        <div className="flex-1">
                            <h4 className="text-sm font-medium text-slate-900">Premium Headphones</h4>
                            <p className="text-xs text-slate-500">Matte Black / Wireless</p>
                            <p className="text-sm font-semibold text-slate-900 mt-1">$299.00</p>
                        </div>
                    </div>

                    <div className="flex items-center gap-4">
                        <div className="w-16 h-16 bg-slate-100 rounded-lg flex items-center justify-center">
                            <img src="https://picsum.photos/65/65" alt="Product" className="rounded-lg" />
                        </div>
                        <div className="flex-1">
                            <h4 className="text-sm font-medium text-slate-900">Carry Case</h4>
                            <p className="text-xs text-slate-500">Waterproof / Grey</p>
                            <p className="text-sm font-semibold text-slate-900 mt-1">$49.00</p>
                        </div>
                    </div>
                </div>

                <div className="mt-8 space-y-3 border-t border-slate-100 pt-6">
                    <div className="flex justify-between text-sm text-slate-600">
                        <span>Subtotal</span>
                        <span>$348.00</span>
                    </div>
                    <div className="flex justify-between text-sm text-slate-600">
                        <span>Shipping</span>
                        <span className="text-green-600 font-medium">Free</span>
                    </div>
                    <div className="flex justify-between text-sm text-slate-600">
                        <span>Tax (8%)</span>
                        <span>$27.84</span>
                    </div>
                    <div
                        className="flex justify-between text-lg font-bold text-slate-900 pt-3 border-t border-slate-100">
                        <span>Total</span>
                        <span>$375.84</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
