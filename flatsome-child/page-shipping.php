<?php
/**
 * Template Name: Shipping and Export Page
 * Vivaaz Gems - Shipping and Export
 * 100% exact fidelity to client demo (Image 3)
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="wrap" style="max-width: 860px; padding-top: 24px; padding-bottom: 70px;">
  <div class="crumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a> › <b>Shipping and export</b></div>
  
  <h1 class="h1" style="margin-top: 14px;">Shipping and export</h1>
  <p class="lead">Every parcel is packed and insured, from Jaipur to your door.</p>
  
  <div class="acc" style="margin-top: 26px;">
    <details open>
      <summary>Within India <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 10l5 5 5-5"/></svg></summary>
      <div class="ab">Insured courier, about 2–3 working days after dispatch. ₹150.</div>
    </details>
    
    <details open>
      <summary>International <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 10l5 5 5-5"/></svg></summary>
      <div class="ab">Insured express (DHL, FedEx or UPS), about 4–7 working days after dispatch. Import duties and taxes are paid by the customer on delivery.</div>
    </details>
    
    <details open>
      <summary>Tracking <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 10l5 5 5-5"/></svg></summary>
      <div class="ab">Tracking by email and WhatsApp: confirmed, shipped (with tracking), delivered.</div>
    </details>
    
    <details open>
      <summary>Insurance <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 10l5 5 5-5"/></svg></summary>
      <div class="ab">Every parcel is insured for its full value until delivered.</div>
    </details>
  </div>
</div>

<?php
get_footer('shop');
