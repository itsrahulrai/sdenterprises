<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            /*
            |--------------------------------------------------------------------------
            | 1. Privacy Policy
            |--------------------------------------------------------------------------
            */
            [
                'title'            => 'Privacy Policy',
                'slug'             => 'privacy-policy',
                'meta_title'       => 'Privacy Policy | S D Enterprises',
                'meta_description' => 'Read the official Privacy Policy of S D Enterprises. Learn how we collect, protect, and handle your data when buying coffee machines and beverage premixes.',
                'meta_keywords'    => 'privacy policy, sd enterprises, data protection, coffee machine delhi, privacy terms',
                'canonical_url'    => url('/privacy-policy'),
                'status'           => 'published',
                'content'          => '
<div class="sde-policy-intro mb-4">
    <p class="lead" style="color: #4A2511; font-weight: 500; font-size: 1.05rem; line-height: 1.75;">
        At <strong>S D Enterprises</strong>, we hold your trust and privacy in the highest regard. This Privacy Policy details how we collect, store, utilize, and protect your personal information when you visit our website, enquire about our services, or purchase commercial coffee and tea vending machines, beverage premixes, and maintenance services.
    </p>
    <p style="color: #7A695C; font-size: 0.92rem;">
        <em>Last Updated: October 2026 | Effective Date: October 2026 | Governing Location: New Delhi, India</em>
    </p>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-info-circle me-2 sde-theme-icon"></i>1. Information We Collect</h3>
    <p>We collect information to facilitate seamless equipment delivery, personalized beverage solutions, order fulfillment, and responsive customer support. The types of information we may collect include:</p>
    <ul class="sde-policy-list">
        <li><strong>Personal Identification Details:</strong> Name, email address, phone/mobile number, company or institution name, and designation.</li>
        <li><strong>Billing & Shipping Information:</strong> Delivery address, office/premises location, pin code, and GSTIN (for B2B tax invoice generation).</li>
        <li><strong>Transaction & Payment Details:</strong> Payment transaction reference numbers, order history, and payment status. <em>(Note: We do not store complete credit/debit card numbers, CVVs, or bank account PINs on our servers).</em></li>
        <li><strong>Technical & Browsing Data:</strong> IP address, browser type, device specifications, operating system, and anonymous website navigation patterns via standard cookies.</li>
        <li><strong>Customer Inquiries & Communications:</strong> Messages, feedback, machine rental requests, or support tickets submitted through our forms or via WhatsApp/Email.</li>
    </ul>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-gear-wide-connected me-2 sde-theme-icon"></i>2. How We Use Your Information</h3>
    <p>Your data is used strictly for legitimate commercial, operational, and customer support purposes, including:</p>
    <ul class="sde-policy-list">
        <li>Processing and fulfilling your orders for tea & coffee machines, premix powders, and spare accessories.</li>
        <li>Arranging timely machine delivery, onsite installation, technician demos, and preventive maintenance visits across Delhi NCR and India.</li>
        <li>Issuing valid GST invoices, payment receipts, and delivery challans.</li>
        <li>Sending order confirmations, tracking alerts, service reminders, and customer care follow-ups.</li>
        <li>Enhancing our website user experience, catalog layout, and beverage solution offerings.</li>
        <li>Complying with applicable legal, taxation, and statutory requirements under Indian law.</li>
    </ul>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-shield-lock me-2 sde-theme-icon"></i>3. Payment Processing & Data Security</h3>
    <p>We prioritize robust data security across all customer interactions:</p>
    <div class="sde-callout-box mb-3">
        <h5 class="mb-2" style="color: #24120A; font-weight: 600;"><i class="bi bi-credit-card-2-front me-2 sde-theme-icon"></i>Secure Payment Gateways</h5>
        <p class="mb-0" style="font-size: 0.92rem; color: #475569;">
            All online financial transactions are handled through PCI-DSS compliant, RBI-authorized payment partners (such as Razorpay). Sensitive card numbers and UPI authentication credentials are processed with 256-bit SSL encryption directly by payment aggregators.
        </p>
    </div>
    <p>We deploy standard firewall protections, secure socket layers (SSL), and restricted database permissions to protect your personal information against unauthorized access, alteration, or disclosure.</p>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-share me-2 sde-theme-icon"></i>4. Sharing & Disclosure of Information</h3>
    <p><strong>We have a strict policy: We never sell, rent, or trade your personal data to third-party marketers or data brokers.</strong></p>
    <p>Information is shared only on a need-to-know basis with trusted operational partners under strict confidentiality agreements:</p>
    <ul class="sde-policy-list">
        <li><strong>Logistics & Freight Partners:</strong> Courier and transport agencies for delivering machines, premix cartons, and spare parts to your address.</li>
        <li><strong>Certified Technical Staff:</strong> Onsite installation and maintenance technicians who service your dispensers.</li>
        <li><strong>Legal Authorities:</strong> Regulatory and law enforcement agencies when mandated by court orders, taxation requirements, or statutory Indian legislation.</li>
    </ul>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-cookie me-2 sde-theme-icon"></i>5. Cookies & Tracking Technologies</h3>
    <p>Our website uses standard cookies and session tracking to improve navigation speed, remember items in your shopping cart, and evaluate website performance. You can disable cookies through your browser settings; however, certain site features (such as checkout and cart storage) may not function optimally without cookies enabled.</p>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-person-check me-2 sde-theme-icon"></i>6. Your Rights & Data Choices</h3>
    <p>As a valued customer, you have the following rights regarding your personal information:</p>
    <ul class="sde-policy-list">
        <li><strong>Access & Correction:</strong> Review or update your registered profile, billing details, or company address at any time by logging into your account or contacting our support.</li>
        <li><strong>Opt-Out of Promotional Emails:</strong> Unsubscribe from marketing updates by clicking the unsubscribe link or writing to us.</li>
        <li><strong>Data Deletion Request:</strong> Request deletion of your user account, subject to standard accounting and tax record-keeping statutory obligations.</li>
    </ul>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-envelope-paper me-2 sde-theme-icon"></i>7. Contact & Grievance Officer</h3>
    <p>If you have any questions, feedback, or grievances concerning this Privacy Policy or your personal information, please reach out to our designated officer:</p>
    <div class="sde-contact-box">
        <h5 style="color: #24120A; font-weight: 700; margin-bottom: 8px;">S D Enterprises</h5>
        <p class="mb-1"><i class="bi bi-geo-alt-fill me-2 sde-theme-icon"></i>Rohini, New Delhi - 110085, India</p>
        <p class="mb-1"><i class="bi bi-telephone-fill me-2 sde-theme-icon"></i>Phone / WhatsApp: <a href="tel:+919911815542" style="color: #5A3218; font-weight: 600;">+91 99118 15542</a></p>
        <p class="mb-0"><i class="bi bi-envelope-fill me-2 sde-theme-icon"></i>Email: <a href="mailto:thahriani.sumit@gmail.com" style="color: #5A3218; font-weight: 600;">thahriani.sumit@gmail.com</a></p>
    </div>
</div>
',
            ],

            /*
            |--------------------------------------------------------------------------
            | 2. Return and Refund Policy
            |--------------------------------------------------------------------------
            */
            [
                'title'            => 'Return and Refund Policy',
                'slug'             => 'return-refund-policy',
                'meta_title'       => 'Return and Refund Policy | S D Enterprises',
                'meta_description' => 'Understand our return and refund guidelines for tea & coffee vending machines, beverage premixes, dispenser parts, and repair services at S D Enterprises.',
                'meta_keywords'    => 'refund policy, return policy, vending machine return, premix return, sd enterprises delhi',
                'canonical_url'    => url('/return-refund-policy'),
                'status'           => 'published',
                'content'          => '
<div class="sde-policy-intro mb-4">
    <p class="lead" style="color: #4A2511; font-weight: 500; font-size: 1.05rem; line-height: 1.75;">
        At <strong>S D Enterprises</strong>, we are committed to delivering premium commercial beverage equipment, authentic premix powders, and reliable maintenance support. This Return and Refund Policy outlines the conditions and procedures for product returns, replacements, cancellations, and refunds.
    </p>
    <p style="color: #7A695C; font-size: 0.92rem;">
        <em>Last Updated: October 2026 | Effective Date: October 2026 | Governing Location: New Delhi, India</em>
    </p>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-cup-hot me-2 sde-theme-icon"></i>1. Product-Wise Return Eligibility</h3>

    <div class="row g-3 mb-3">
        <div class="col-md-6">
            <div class="sde-feature-card h-100 p-3" style="background:#FAF7F2; border:1px solid #ECE3DA; border-radius:14px;">
                <h5 style="color:#24120A; font-weight:700;"><i class="bi bi-cpu me-2 sde-theme-icon"></i>Commercial Vending Machines</h5>
                <p style="font-size:0.91rem; color:#475569; line-height:1.65; margin-bottom:8px;">
                    <strong>7-Day Replacement / Return Window:</strong> Applicable if a machine is received with physical transit damage, internal component failure, or manufacturing defect.
                </p>
                <p style="font-size:0.88rem; color:#7A695C; margin-bottom:0;">
                    <em>Must be reported within 7 calendar days of delivery with original crates, manuals, canisters, and accessories.</em>
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="sde-feature-card h-100 p-3" style="background:#FAF7F2; border:1px solid #ECE3DA; border-radius:14px;">
                <h5 style="color:#24120A; font-weight:700;"><i class="bi bi-bag-check me-2 sde-theme-icon"></i>Premixes & Consumables</h5>
                <p style="font-size:0.91rem; color:#475569; line-height:1.65; margin-bottom:8px;">
                    <strong>Food Safety & Hygiene (FSSAI):</strong> Premix packets (tea, coffee, dairy whiteners, soup powders) once opened or unsealed <strong>cannot</strong> be returned or refunded.
                </p>
                <p style="font-size:0.88rem; color:#7A695C; margin-bottom:0;">
                    <em>Unopened cartons damaged in transit or incorrect flavors are replaced immediately if reported within 48 hours.</em>
                </p>
            </div>
        </div>
    </div>

    <div class="sde-feature-card p-3 mb-3" style="background:#FAF7F2; border:1px solid #ECE3DA; border-radius:14px;">
        <h5 style="color:#24120A; font-weight:700;"><i class="bi bi-tools me-2 sde-theme-icon"></i>Spare Parts & Accessories</h5>
        <p style="font-size:0.91rem; color:#475569; line-height:1.65; margin-bottom:0;">
            Mixing bowls, dispensing valves, silicone tubes, drip trays, and canisters can be returned within <strong>7 days</strong> of receipt provided they are unused, uninstalled, and in original packaging.
        </p>
    </div>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-arrow-repeat me-2 sde-theme-icon"></i>2. Return & Replacement Process</h3>
    <p>To initiate a return or claim a replacement, follow these simple steps:</p>
    <ol class="sde-policy-list" style="padding-left: 20px;">
        <li><strong>Step 1 - Notify Our Team:</strong> Contact us within the applicable return window via email at <a href="mailto:thahriani.sumit@gmail.com" style="color:#5A3218; font-weight:600;">thahriani.sumit@gmail.com</a> or phone/WhatsApp at <a href="tel:+919911815542" style="color:#5A3218; font-weight:600;">+91 99118 15542</a>. Provide your Order Number, photos/video of the issue, and a short description.</li>
        <li><strong>Step 2 - Verification:</strong> Our technical team will review the issue. For machines in Delhi NCR, we may schedule an onsite technician visit to assess or repair the equipment.</li>
        <li><strong>Step 3 - Reverse Pickup or Dispatch:</strong> If a replacement or return is approved, we will arrange a reverse pickup from your premises or provide clear return shipping instructions.</li>
        <li><strong>Step 4 - Inspection & Resolution:</strong> Upon receiving the item in our warehouse, we inspect the condition and either dispatch the replacement unit immediately or initiate your refund.</li>
    </ol>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-x-circle me-2 sde-theme-icon"></i>3. Cancellation Policy</h3>
    <ul class="sde-policy-list">
        <li><strong>Orders Cancelled Prior to Dispatch:</strong> If you cancel your order before the item has been packed and handed over to our logistics partner, a <strong>100% full refund</strong> is issued immediately without any deduction.</li>
        <li><strong>Orders Cancelled After Dispatch:</strong> If an order is cancelled while in transit, the return freight and handling charges incurred will be deducted from the refund amount.</li>
        <li><strong>Machine Rental / AMC Service Termination:</strong> Monthly machine rentals or Annual Maintenance Contracts can be cancelled with a 30-day written notice as per mutual service agreement terms.</li>
    </ul>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-currency-rupee me-2 sde-theme-icon"></i>4. Refund Timelines & Payment Mode</h3>
    <div class="sde-callout-box mb-3">
        <ul class="mb-0" style="padding-left: 18px; font-size: 0.92rem; color: #334155;">
            <li><strong>Prepaid Orders (Cards / Net Banking / UPI / Razorpay):</strong> The refund amount will be credited back directly to the original payment source within <strong>5 to 7 business days</strong> following approval.</li>
            <li><strong>Cash on Delivery (COD) / Direct Bank Transfers:</strong> Refunds will be transferred via NEFT/IMPS or UPI to the bank account specified by the customer within <strong>3 to 5 business days</strong>.</li>
        </ul>
    </div>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-exclamation-triangle me-2 sde-theme-icon"></i>5. Non-Returnable Scenarios</h3>
    <p>Returns or refunds cannot be accepted under the following conditions:</p>
    <ul class="sde-policy-list">
        <li>Premix food packets with opened outer seals or torn packaging.</li>
        <li>Equipment damaged due to electrical voltage surges, improper electrical grounding, or connection to unapproved high-voltage sockets without stabilizers.</li>
        <li>Damage caused by hard water scaling where clients failed to use RO purified water.</li>
        <li>Machines repaired, modified, or dismantled by unauthorized third-party technicians without S D Enterprises approval.</li>
        <li>Missing original serial numbers, rating plates, or warranty stickers.</li>
    </ul>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-headset me-2 sde-theme-icon"></i>6. Need Assistance with a Return?</h3>
    <p>Our dedicated support team is available Monday to Saturday (9:30 AM to 7:00 PM) to help you resolve any issues:</p>
    <div class="sde-contact-box">
        <h5 style="color: #24120A; font-weight: 700; margin-bottom: 8px;">S D Enterprises Customer Support</h5>
        <p class="mb-1"><i class="bi bi-telephone-fill me-2 sde-theme-icon"></i>Direct Helpdesk: <a href="tel:+919911815542" style="color: #5A3218; font-weight: 600;">+91 99118 15542</a></p>
        <p class="mb-1"><i class="bi bi-envelope-fill me-2 sde-theme-icon"></i>Claims & Returns: <a href="mailto:thahriani.sumit@gmail.com" style="color: #5A3218; font-weight: 600;">thahriani.sumit@gmail.com</a></p>
        <p class="mb-0"><i class="bi bi-geo-alt-fill me-2 sde-theme-icon"></i>Rohini, New Delhi - 110085, India</p>
    </div>
</div>
',
            ],

            /*
            |--------------------------------------------------------------------------
            | 3. Shipping Policy
            |--------------------------------------------------------------------------
            */
            [
                'title'            => 'Shipping Policy',
                'slug'             => 'shipping-policy',
                'meta_title'       => 'Shipping & Delivery Policy | S D Enterprises',
                'meta_description' => 'Review S D Enterprises shipping timelines, delivery coverage in Delhi NCR and India, free shipping threshold, and equipment unboxing guidelines.',
                'meta_keywords'    => 'shipping policy, delivery policy, coffee machine delivery, tea premix courier, sd enterprises shipping',
                'canonical_url'    => url('/shipping-policy'),
                'status'           => 'published',
                'content'          => '
<div class="sde-policy-intro mb-4">
    <p class="lead" style="color: #4A2511; font-weight: 500; font-size: 1.05rem; line-height: 1.75;">
        At <strong>S D Enterprises</strong>, we ensure that your commercial tea & coffee vending machines, beverage premixes, and dispenser parts are securely packed and delivered safely to your doorstep or workplace on time.
    </p>
    <p style="color: #7A695C; font-size: 0.92rem;">
        <em>Last Updated: October 2026 | Effective Date: October 2026 | Governing Location: New Delhi, India</em>
    </p>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-geo-alt me-2 sde-theme-icon"></i>1. Service Locations & Delivery Zones</h3>
    <ul class="sde-policy-list">
        <li><strong>Delhi NCR (Primary Zone):</strong> Comprehensive same-day or next-day delivery across New Delhi, North Delhi, South Delhi, East Delhi, West Delhi, Noida, Greater Noida, Gurugram, Faridabad, and Ghaziabad.</li>
        <li><strong>Pan-India Shipping:</strong> Delivery across all serviceable pincodes in India via our network of verified surface and express logistics partners (Bluedart, Delhivery, DTDC, TCI Freight, and Gati).</li>
    </ul>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-clock-history me-2 sde-theme-icon"></i>2. Order Processing & Dispatch Timelines</h3>
    <ul class="sde-policy-list">
        <li><strong>Processing Time:</strong> Orders are verified, tested (for machines), and packed within <strong>24 to 48 business hours</strong> of payment confirmation (Monday through Saturday).</li>
        <li><strong>Delivery Estimates:</strong>
            <ul style="margin-top: 6px; padding-left: 20px;">
                <li><strong>Delhi NCR:</strong> 1 to 3 business days. Corporate emergency premix deliveries can often be arranged same-day upon prior request.</li>
                <li><strong>Rest of India (Tier 1 & Tier 2 Cities):</strong> 3 to 6 business days.</li>
                <li><strong>Remote or Rural Pincodes:</strong> 5 to 8 business days depending on local road conditions and courier accessibility.</li>
            </ul>
        </li>
    </ul>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-truck me-2 sde-theme-icon"></i>3. Shipping Charges & Free Shipping Threshold</h3>
    <div class="row g-3 mb-3">
        <div class="col-md-6">
            <div class="p-3" style="background:#FAF2EC; border:1px solid #EAD8CC; border-radius:14px;">
                <h5 style="color:#5A3218; font-weight:700; margin-bottom:6px;"><i class="bi bi-gift-fill me-2 sde-theme-icon"></i>Free Shipping Above ₹5,000</h5>
                <p style="font-size:0.91rem; color:#334155; margin-bottom:0;">
                    All orders with an aggregate cart value of <strong>₹5,000 or more</strong> qualify for <strong>FREE standard delivery</strong> across all supported delivery locations.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-3" style="background:#FAF7F2; border:1px solid #ECE3DA; border-radius:14px;">
                <h5 style="color:#5A3218; font-weight:700; margin-bottom:6px;"><i class="bi bi-box-seam me-2 sde-theme-icon"></i>Standard Delivery: ₹250</h5>
                <p style="font-size:0.91rem; color:#475569; margin-bottom:0;">
                    For smaller orders below ₹5,000, a nominal flat shipping fee of <strong>₹250</strong> is automatically applied at checkout to cover transit and packaging costs.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-shield-check me-2 sde-theme-icon"></i>4. Machine Packaging & Safe Transit</h3>
    <p>Commercial beverage equipment contains precision electronic boards, internal pumps, and hot water boilers. We adhere to stringent packaging protocols:</p>
    <ul class="sde-policy-list">
        <li>Every machine is packed in heavy-duty 5-ply/7-ply corrugated boxes reinforced with dense molded thermocol corners and moisture-resistant shrink wrapping.</li>
        <li>For long-distance Pan-India shipments, machines are strapped into wooden reinforcement frames to prevent tipping during surface transport.</li>
        <li>Premix cartons are moisture-sealed in tamper-evident corrugated boxes with fragile indicator labels.</li>
    </ul>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-wrench-adjustable me-2 sde-theme-icon"></i>5. Onsite Installation & Delivery Demo (Delhi NCR)</h3>
    <p>For commercial vending machines delivered within Delhi NCR, S D Enterprises offers <strong>onsite installation, machine calibration, and staff operation training</strong> by our certified beverage technicians. Our team will coordinate the installation date and time with your facilities manager after order confirmation.</p>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-pin-map me-2 sde-theme-icon"></i>6. Order Tracking & Transit Damage Reporting</h3>
    <ul class="sde-policy-list">
        <li><strong>Consignment Tracking:</strong> As soon as your order is dispatched, you will receive an automated notification with the courier name, tracking ID (AWB), and live parcel tracking link.</li>
        <li><strong>Damaged Shipments on Arrival:</strong> In the rare event that the outer carton appears severely tampered with or punctured upon arrival, please mention <em>"Received in Damaged Condition"</em> on the courier delivery acknowledgment slip and photograph the outer package before accepting. Notify us at <a href="mailto:thahriani.sumit@gmail.com" style="color:#5A3218; font-weight:600;">thahriani.sumit@gmail.com</a> within 24 to 48 hours for immediate replacement assistance.</li>
    </ul>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-question-circle me-2 sde-theme-icon"></i>7. Shipping Support & Tracking Help</h3>
    <div class="sde-contact-box">
        <h5 style="color: #24120A; font-weight: 700; margin-bottom: 8px;">S D Enterprises Dispatch & Logistics</h5>
        <p class="mb-1"><i class="bi bi-telephone-fill me-2 sde-theme-icon"></i>Logistics Helpline: <a href="tel:+919911815542" style="color: #5A3218; font-weight: 600;">+91 99118 15542</a></p>
        <p class="mb-1"><i class="bi bi-envelope-fill me-2 sde-theme-icon"></i>Dispatch Inquiries: <a href="mailto:thahriani.sumit@gmail.com" style="color: #5A3218; font-weight: 600;">thahriani.sumit@gmail.com</a></p>
        <p class="mb-0"><i class="bi bi-geo-alt-fill me-2 sde-theme-icon"></i>Rohini, New Delhi - 110085, India</p>
    </div>
</div>
',
            ],

            /*
            |--------------------------------------------------------------------------
            | 4. Terms and Conditions
            |--------------------------------------------------------------------------
            */
            [
                'title'            => 'Terms and Conditions',
                'slug'             => 'terms-and-conditions',
                'meta_title'       => 'Terms and Conditions | S D Enterprises',
                'meta_description' => 'Review the Terms and Conditions of S D Enterprises regarding purchase, rental, warranty, and maintenance of tea & coffee vending machines and premixes.',
                'meta_keywords'    => 'terms and conditions, sd enterprises terms, vending machine warranty, terms of service delhi',
                'canonical_url'    => url('/terms-and-conditions'),
                'status'           => 'published',
                'content'          => '
<div class="sde-policy-intro mb-4">
    <p class="lead" style="color: #4A2511; font-weight: 500; font-size: 1.05rem; line-height: 1.75;">
        Welcome to <strong>S D Enterprises</strong>. By accessing our website, placing an order, requesting equipment rental, or utilizing our machine maintenance services, you agree to be bound by the following Terms & Conditions. Please read them thoroughly.
    </p>
    <p style="color: #7A695C; font-size: 0.92rem;">
        <em>Last Updated: October 2026 | Effective Date: October 2026 | Governing Location: New Delhi, India</em>
    </p>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-file-earmark-check me-2 sde-theme-icon"></i>1. Acceptance of Terms</h3>
    <p>These Terms & Conditions constitute a legally binding agreement between you (the "Customer", "Client", or "User") and <strong>S D Enterprises</strong> ("we", "us", or "our"), governing your access to our website, purchase of beverage vending machines, procurement of premixes and consumables, equipment rental contracts, and technical support services.</p>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-buildings me-2 sde-theme-icon"></i>2. Commercial Use & Eligibility</h3>
    <ul class="sde-policy-list">
        <li>Our products and solutions are intended for corporate offices, commercial workspaces, factories, healthcare institutions, hotels, retail outlets, as well as residential consumers across India.</li>
        <li>You affirm that you are at least 18 years of age and hold the legal capacity to enter into binding agreements on your own behalf or on behalf of your registered company.</li>
    </ul>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-receipt me-2 sde-theme-icon"></i>3. Product Descriptions, Pricing & GST Invoicing</h3>
    <ul class="sde-policy-list">
        <li><strong>Accuracy of Information:</strong> While we endeavor to provide precise cup capacities, dispensing rates, technical specifications, and imagery, slight variations may exist due to manufacturer model upgrades.</li>
        <li><strong>Pricing & Taxes:</strong> All product prices are quoted in Indian Rupees (₹ INR). Prices displayed on the website are exclusive or inclusive of GST as marked. Applicable GST rates are calculated and reflected at checkout.</li>
        <li><strong>B2B Tax Invoicing:</strong> Registered businesses seeking GST Input Tax Credit must provide an active, valid GSTIN and correct legal trade name during checkout. Tax invoices once generated cannot be revised retroactively.</li>
        <li><strong>Price Revisions:</strong> We reserve the right to alter pricing, discounts, and promotional offers at any time without prior notice. Confirmed orders will not be affected by subsequent price alterations.</li>
    </ul>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-shield-shaded me-2 sde-theme-icon"></i>4. Machine Warranty & Operational Guidelines</h3>
    <p>To ensure optimal machine longevity and uphold warranty eligibility, clients must observe the following conditions:</p>
    <div class="sde-callout-box mb-3">
        <h5 style="color: #24120A; font-weight: 600;"><i class="bi bi-water me-2 sde-theme-icon"></i>Water Quality & Voltage Stabilization Mandate</h5>
        <p class="mb-0" style="font-size: 0.92rem; color: #475569;">
            Commercial vending machines must strictly be operated with <strong>TDS-controlled RO purified water</strong> (TDS between 50 and 150 ppm) to prevent severe boiler scaling. In regions prone to power fluctuations, a suitable electrical voltage stabilizer must be connected.
        </p>
    </div>
    <ul class="sde-policy-list">
        <li>New machines come with standard manufacturer warranty covering functional mechanical and electrical defects.</li>
        <li>The warranty does <strong>not</strong> cover damages resulting from lime scale accumulation (due to tap/hard water), voltage surges, rodent infestation, physical drops, or unapproved repairs by external technicians.</li>
    </ul>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-file-earmark-text me-2 sde-theme-icon"></i>5. Equipment Rentals & Maintenance Contracts (AMC)</h3>
    <ul class="sde-policy-list">
        <li>Rental machines remain the exclusive property of S D Enterprises at all times. The client is responsible for safe custody and reasonable daily care of the equipment.</li>
        <li>Clients renting machines agree to purchase approved beverage premixes exclusively through S D Enterprises to safeguard dispensing mechanics and taste standards.</li>
        <li>Routine sanitization, descaling, and technician service visits will be conducted as per the specific provisions of your active AMC or Rental agreement.</li>
    </ul>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-c-circle me-2 sde-theme-icon"></i>6. Intellectual Property</h3>
    <p>All content on this website—including text, graphics, logos, product images, icons, and software—is the proprietary property of S D Enterprises or its respected manufacturing partners (such as Atlantis, Nescafe, etc.) and is protected under Indian and international copyright and trademark laws. Unauthorized reproduction or commercial copying is strictly prohibited.</p>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-shield-x me-2 sde-theme-icon"></i>7. Limitation of Liability & Force Majeure</h3>
    <p>S D Enterprises shall not be held liable for any indirect, incidental, punitive, or consequential damages resulting from the use or inability to use our equipment, electrical outages, courier transit delays caused by strikes, natural disasters, or third-party carrier bottlenecks.</p>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-bank me-2 sde-theme-icon"></i>8. Governing Law & Jurisdiction</h3>
    <p>These Terms & Conditions are governed by and construed in accordance with the laws of the Republic of India. Any disputes, controversies, or claims arising from or related to our products or services shall be subject to the exclusive jurisdiction of the competent courts located in <strong>New Delhi, India</strong>.</p>
</div>

<div class="sde-policy-section mb-4">
    <h3 class="sde-policy-heading"><i class="bi bi-chat-left-dots me-2 sde-theme-icon"></i>9. Contact Information</h3>
    <p>If you require any clarification regarding these Terms & Conditions or have questions about an order or quotation, please reach out to us:</p>
    <div class="sde-contact-box">
        <h5 style="color: #24120A; font-weight: 700; margin-bottom: 8px;">S D Enterprises</h5>
        <p class="mb-1"><i class="bi bi-geo-alt-fill me-2 sde-theme-icon"></i>Rohini, New Delhi - 110085, India</p>
        <p class="mb-1"><i class="bi bi-telephone-fill me-2 sde-theme-icon"></i>Phone / WhatsApp: <a href="tel:+919911815542" style="color: #5A3218; font-weight: 600;">+91 99118 15542</a></p>
        <p class="mb-0"><i class="bi bi-envelope-fill me-2 sde-theme-icon"></i>Email: <a href="mailto:thahriani.sumit@gmail.com" style="color: #5A3218; font-weight: 600;">thahriani.sumit@gmail.com</a></p>
    </div>
</div>
',
            ],
        ];

        foreach ($pages as $pageData) {
            Page::updateOrCreate(
                ['slug' => $pageData['slug']],
                $pageData
            );
        }
    }
}
