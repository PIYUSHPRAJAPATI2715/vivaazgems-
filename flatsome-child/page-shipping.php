<?php
/**
 * Template Name: Shipping and Export Page
 * Vivaaz Gems - Shipping and Export
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 60px 20px; min-height: 80vh;">
  <div class="container" style="max-width: 900px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 40px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">SUPPORT & LOGISTICS</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 10px 0 12px; color: #1C1A17;">Shipping and export</h1>
      <p style="font-size: 16px; color: #4A4640; max-width: 680px; margin: 0 auto;">
        Every parcel leaves Jaipur packed, insured and tracked. Here is how it works.
      </p>
    </div>

    <!-- 2 Column Overview: India vs International -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 32px;">
      
      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 32px;">
        <div style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase; margin-bottom: 8px;">DOMESTIC</div>
        <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 0 0 16px; color: #1C1A17;">Within India</h2>
        <ul style="list-style: none; padding: 0; margin: 0; font-size: 13px; line-height: 1.8; color: #4A4640;">
          <li><strong>Courier:</strong> Insured express courier to every pin code we can reach.</li>
          <li><strong>Time:</strong> Usually 2 to 3 working days after dispatch. Remote areas can take a little longer.</li>
          <li><strong>Cost:</strong> Shown in the cart before you pay.</li>
          <li><strong>Dispatch:</strong> Stones are dispatched within 1 to 2 working days of payment, after a final check.</li>
        </ul>
      </div>

      <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 32px;">
        <div style="font-size: 11px; font-weight: 700; letter-spacing: 0.1em; color: #9C7C4C; text-transform: uppercase; margin-bottom: 8px;">WORLDWIDE</div>
        <h2 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 0 0 16px; color: #1C1A17;">International</h2>
        <ul style="list-style: none; padding: 0; margin: 0; font-size: 13px; line-height: 1.8; color: #4A4640;">
          <li><strong>Courier:</strong> DHL, FedEx or UPS, insured and tracked door to door.</li>
          <li><strong>Time:</strong> Usually 4 to 7 working days after dispatch, depending on country and customs.</li>
          <li><strong>Cost:</strong> Shown in the cart before you pay, based on destination and weight.</li>
          <li><strong>Export paperwork:</strong> We prepare the invoice and any export declaration needed from India.</li>
        </ul>
      </div>

    </div>

    <!-- Detailed Policies Cards -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px; display: flex; flex-direction: column; gap: 24px; margin-bottom: 32px;">
      
      <div>
        <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 20px; color: #1C1A17; margin: 0 0 8px;">Import duties and taxes</h3>
        <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin: 0;">
          These are charged by your country and are paid by you, the customer, on delivery or to the courier. They are not included in our prices. We declare the true value and description of the goods on every shipment.
        </p>
      </div>

      <hr style="border: none; border-top: 1px solid #EBE7DF; margin: 0;">

      <div>
        <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 20px; color: #1C1A17; margin: 0 0 8px;">Tracking</h3>
        <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin: 0;">
          As soon as your parcel is dispatched you receive the tracking number by email and WhatsApp. You can also see it under Orders in your account, or on our <a href="<?php echo esc_url(home_url('/track-order/')); ?>" style="color: #9C7C4C; text-decoration: underline;">Track order page</a>.
        </p>
      </div>

      <hr style="border: none; border-top: 1px solid #EBE7DF; margin: 0;">

      <div>
        <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 20px; color: #1C1A17; margin: 0 0 8px;">Insurance</h3>
        <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin: 0;">
          Every shipment is insured for its full value until it is delivered. If a parcel is lost or damaged in transit, we replace the stones or refund you; please tell us within 48 hours of the delivery date shown by the courier.
        </p>
      </div>

      <hr style="border: none; border-top: 1px solid #EBE7DF; margin: 0;">

      <div>
        <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 20px; color: #1C1A17; margin: 0 0 8px;">Delivery dates</h3>
        <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin: 0;">
          We give an estimate, not a promise. Customs checks and courier delays are outside our control. If your order is for a deadline, tell us on WhatsApp and we will advise the safest option.
        </p>
      </div>

      <hr style="border: none; border-top: 1px solid #EBE7DF; margin: 0;">

      <div>
        <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 20px; color: #1C1A17; margin: 0 0 8px;">Packing</h3>
        <p style="font-size: 14px; line-height: 1.8; color: #4A4640; margin: 0;">
          Stones are packed in sealed paper parcels or boxes, inside a padded envelope, inside the courier box. Layouts are packed in order, on a card, so you can see the line as it was matched.
        </p>
      </div>

    </div>

    <!-- CTA Box -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 28px; text-align: center;">
      <p style="font-size: 14px; color: #1C1A17; margin-bottom: 16px;">Questions about shipping to your country?</p>
      <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I have a question about shipping to my country.'); ?>" target="_blank" class="btn-square-dark" style="display: inline-block; padding: 14px 28px; background: #25D366; color: #FFFFFF; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">
        WHATSAPP US
      </a>
    </div>

  </div>
</div>

<?php
get_footer('shop');
