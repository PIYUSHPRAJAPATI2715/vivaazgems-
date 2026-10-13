<?php
/**
 * Template Name: Treatments Page
 * Vivaaz Gems - How We Describe Treatments
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 60px 20px; min-height: 80vh;">
  <div class="container" style="max-width: 900px; margin: 0 auto;">
    
    <div style="text-align: center; margin-bottom: 40px;">
      <span class="section-tag-divider" style="letter-spacing: 0.15em; font-size: 11px; font-weight: 700; color: #9C7C4C; text-transform: uppercase;">DISCLOSURE & INTEGRITY</span>
      <h1 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; font-weight: 400; margin: 10px 0 12px; color: #1C1A17;">How we describe treatments</h1>
      <p style="font-size: 16px; color: #4A4640; max-width: 720px; margin: 0 auto; line-height: 1.8;">
        Many natural gemstones are treated to improve their colour or clarity. This is normal and accepted in the gem trade, as long as it is clearly disclosed. On every product page the "Treatment" line in "The stone" tells you what we know about that stone.
      </p>
    </div>

    <!-- Treatment Disclosure Table Card -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px; margin-bottom: 32px;">
      <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
        <thead>
          <tr style="border-bottom: 2px solid #EBE7DF; background: #FAF7F2;">
            <th style="padding: 14px 16px; text-align: left; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: #9C7C4C; width: 25%;">Word we use</th>
            <th style="padding: 14px 16px; text-align: left; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: #9C7C4C;">What it means</th>
          </tr>
        </thead>
        <tbody>
          <tr style="border-bottom: 1px solid #EBE7DF;">
            <td style="padding: 16px; font-weight: 700; color: #1C1A17;">None</td>
            <td style="padding: 16px; color: #4A4640; line-height: 1.6;">Natural and untreated.</td>
          </tr>
          <tr style="border-bottom: 1px solid #EBE7DF;">
            <td style="padding: 16px; font-weight: 700; color: #1C1A17;">Heated</td>
            <td style="padding: 16px; color: #4A4640; line-height: 1.6;">Heating to improve colour or clarity. Common and stable for sapphire, ruby, tanzanite, citrine and aquamarine.</td>
          </tr>
          <tr style="border-bottom: 1px solid #EBE7DF;">
            <td style="padding: 16px; font-weight: 700; color: #1C1A17;">Oiled</td>
            <td style="padding: 16px; color: #4A4640; line-height: 1.6;">Colourless oil in small surface fractures. The usual practice for emerald.</td>
          </tr>
          <tr style="border-bottom: 1px solid #EBE7DF;">
            <td style="padding: 16px; font-weight: 700; color: #1C1A17;">Irradiated</td>
            <td style="padding: 16px; color: #4A4640; line-height: 1.6;">Irradiated, then heated, to create the colour. All blue topaz is treated this way.</td>
          </tr>
          <tr style="border-bottom: 1px solid #EBE7DF;">
            <td style="padding: 16px; font-weight: 700; color: #1C1A17;">Dyed or coated</td>
            <td style="padding: 16px; color: #4A4640; line-height: 1.6;">Colour added to the surface or inside. We say so clearly and price accordingly.</td>
          </tr>
          <tr>
            <td style="padding: 16px; font-weight: 700; color: #1C1A17;">Glass filled</td>
            <td style="padding: 16px; color: #4A4640; line-height: 1.6;">We do not sell glass-filled stones as natural.</td>
          </tr>
        </tbody>
      </table>

      <div style="margin-top: 28px; padding-top: 20px; border-top: 1px solid #EBE7DF; font-size: 13px; line-height: 1.8; color: #76706A;">
        Synthetic or imitation stones are never sold as natural. When we are not sure about a treatment, we write "treatment not tested" rather than guessing. A laboratory certificate can confirm the treatment of any stone; see <a href="<?php echo esc_url(home_url('/certificates/')); ?>" style="color: #9C7C4C; text-decoration: underline;">Certificates</a>.
      </div>
    </div>

    <!-- CTA -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 28px; text-align: center;">
      <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn-square-dark" style="display: inline-block; padding: 14px 28px; background: #1C1A17; color: #FFFFFF; text-decoration: none; font-size: 11px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">
        EXPLORE NATURAL GEMSTONES →
      </a>
    </div>

  </div>
</div>

<?php
get_footer('shop');
