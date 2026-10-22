<?php
/**
 * Template Name: Astrology Page
 * Vivaaz Gems - Gemstones and Astrology
 * Strictly matches Client Demo Screenshots & Vivaaz-Website-Desktop-Demo (1).html 100%.
 */

defined('ABSPATH') || exit;

get_header('shop');

// Load gem images from json or fallback
$gem_json_path = get_stylesheet_directory() . '/gem-images-data.json';
$gem_imgs = array();
if (file_exists($gem_json_path)) {
    $gem_imgs = json_decode(file_get_contents($gem_json_path), true);
}

// 9 Planets Data matching Demo 100%
$planets_data = array(
    array(
        'name'        => 'Sun',
        'hindi'       => 'Surya',
        'stone'       => 'Ruby',
        'hindi_stone' => 'Manik',
        'gem_key'     => 'ruby',
        'filter'      => '',
        'subs'        => 'Red garnet, red spinel',
        'weight'      => '3 to 6 ratti (2.7 to 5.5 ct), as advised',
        'metal'       => 'Gold or copper',
        'finger'      => 'Ring finger, right hand',
        'day'         => 'Sunday morning',
        'cert'        => 'Included',
        'purpose'     => 'confidence and leadership',
        'link_text'   => 'See our rubies →',
        'link_url'    => home_url('/gemstones/?stone=ruby')
    ),
    array(
        'name'        => 'Moon',
        'hindi'       => 'Chandra',
        'stone'       => 'Pearl',
        'hindi_stone' => 'Moti',
        'gem_key'     => 'pearl',
        'filter'      => '',
        'subs'        => 'Moonstone',
        'weight'      => '4 to 6 ratti (3.6 to 5.5 ct), as advised',
        'metal'       => 'Silver',
        'finger'      => 'Little finger',
        'day'         => 'Monday morning',
        'cert'        => 'Included',
        'purpose'     => 'calm and clear thinking',
        'link_text'   => 'See our moonstones →',
        'link_url'    => home_url('/gemstones/?stone=rainbow-moonstone')
    ),
    array(
        'name'        => 'Mars',
        'hindi'       => 'Mangal',
        'stone'       => 'Red coral',
        'hindi_stone' => 'Moonga',
        'gem_key'     => 'coral',
        'filter'      => 'hue-rotate(15deg) saturate(1.8) brightness(1.1)',
        'subs'        => 'Carnelian',
        'weight'      => '6 to 9 ratti (5.5 to 8.2 ct), as advised',
        'metal'       => 'Gold or copper',
        'finger'      => 'Ring finger',
        'day'         => 'Tuesday morning',
        'cert'        => 'Included',
        'purpose'     => 'energy and courage',
        'link_text'   => 'Ask for red coral →',
        'link_url'    => 'https://wa.me/919680552270?text=' . rawurlencode('Hello Vivaaz Gems, please show me natural certified Red Coral (Moonga) for Mars.')
    ),
    array(
        'name'        => 'Mercury',
        'hindi'       => 'Budh',
        'stone'       => 'Emerald',
        'hindi_stone' => 'Panna',
        'gem_key'     => 'emerald',
        'filter'      => '',
        'subs'        => 'Peridot',
        'weight'      => '3 to 6 ratti (2.7 to 5.5 ct), as advised',
        'metal'       => 'Gold',
        'finger'      => 'Little finger',
        'day'         => 'Wednesday morning',
        'cert'        => 'Included',
        'purpose'     => 'speech and learning',
        'link_text'   => 'See our emeralds →',
        'link_url'    => home_url('/gemstones/?stone=emerald')
    ),
    array(
        'name'        => 'Jupiter',
        'hindi'       => 'Guru',
        'stone'       => 'Yellow sapphire',
        'hindi_stone' => 'Pukhraj',
        'gem_key'     => 'yellow-sapphire',
        'filter'      => 'hue-rotate(185deg) saturate(1.5) brightness(1.15)',
        'subs'        => 'Citrine',
        'weight'      => '3 to 5 ratti (2.7 to 4.6 ct), as advised',
        'metal'       => 'Gold',
        'finger'      => 'Index finger',
        'day'         => 'Thursday morning',
        'cert'        => 'Included',
        'purpose'     => 'wisdom and growth',
        'link_text'   => 'See our yellow sapphires →',
        'link_url'    => home_url('/gemstones/?stone=sapphire')
    ),
    array(
        'name'        => 'Venus',
        'hindi'       => 'Shukra',
        'stone'       => 'White sapphire',
        'hindi_stone' => 'Safed pukhraj',
        'gem_key'     => 'white-sapphire',
        'filter'      => 'grayscale(1) brightness(1.2) contrast(1.1)',
        'subs'        => 'White topaz',
        'weight'      => '2 to 4 ratti (1.8 to 3.6 ct), as advised',
        'metal'       => 'Silver or white gold',
        'finger'      => 'Middle finger',
        'day'         => 'Friday morning',
        'cert'        => 'Included',
        'purpose'     => 'comfort and harmony',
        'link_text'   => 'See our white sapphires →',
        'link_url'    => home_url('/gemstones/?stone=sapphire')
    ),
    array(
        'name'        => 'Saturn',
        'hindi'       => 'Shani',
        'stone'       => 'Blue sapphire',
        'hindi_stone' => 'Neelam',
        'gem_key'     => 'sapphire',
        'filter'      => '',
        'subs'        => 'Amethyst',
        'weight'      => '3 to 5 ratti (2.7 to 4.6 ct), as advised',
        'metal'       => 'Silver',
        'finger'      => 'Middle finger',
        'day'         => 'Saturday evening',
        'cert'        => 'Included',
        'purpose'     => 'discipline and focus',
        'link_text'   => 'See our blue sapphires →',
        'link_url'    => home_url('/gemstones/?stone=sapphire')
    ),
    array(
        'name'        => 'Rahu',
        'hindi'       => 'Rahu',
        'stone'       => 'Hessonite',
        'hindi_stone' => 'Gomed',
        'gem_key'     => 'garnet',
        'filter'      => 'hue-rotate(-20deg) contrast(1.2)',
        'subs'        => 'Garnet',
        'weight'      => '5 to 8 ratti (4.6 to 7.3 ct), as advised',
        'metal'       => 'Silver',
        'finger'      => 'Middle finger',
        'day'         => 'Saturday evening',
        'cert'        => 'Included',
        'purpose'     => 'clarity in confusing times',
        'link_text'   => 'See our garnets →',
        'link_url'    => home_url('/gemstones/?stone=garnet')
    ),
    array(
        'name'        => 'Ketu',
        'hindi'       => 'Ketu',
        'stone'       => "Cat's eye",
        'hindi_stone' => 'Lehsunia',
        'gem_key'     => 'cats-eye',
        'filter'      => 'sepia(0.8) hue-rotate(40deg) saturate(1.4)',
        'subs'        => 'Tiger eye',
        'weight'      => '3 to 5 ratti (2.7 to 4.6 ct), as advised',
        'metal'       => 'Silver',
        'finger'      => 'Little finger',
        'day'         => 'Tuesday',
        'cert'        => 'Included',
        'purpose'     => 'letting go and focus',
        'link_text'   => "Ask for cat's eye →",
        'link_url'    => 'https://wa.me/919680552270?text=' . rawurlencode("Hello Vivaaz Gems, please show me natural certified Cat's Eye (Lehsunia) for Ketu.")
    )
);

// 12 Months Birthstones Data matching Demo 100%
$birthstones_data = array(
    array('month' => 'January',   'stone' => 'Garnet',                         'id' => 'garnet'),
    array('month' => 'February',  'stone' => 'Amethyst',                       'id' => 'amethyst'),
    array('month' => 'March',     'stone' => 'Aquamarine',                     'id' => 'aquamarine'),
    array('month' => 'April',     'stone' => 'Diamond, rock crystal',          'id' => null),
    array('month' => 'May',       'stone' => 'Emerald',                        'id' => 'emerald'),
    array('month' => 'June',      'stone' => 'Pearl, moonstone',               'id' => 'rainbow-moonstone'),
    array('month' => 'July',      'stone' => 'Ruby',                           'id' => 'ruby'),
    array('month' => 'August',    'stone' => 'Peridot, spinel',                'id' => 'peridot'),
    array('month' => 'September', 'stone' => 'Sapphire',                       'id' => 'sapphire'),
    array('month' => 'October',   'stone' => 'Opal, tourmaline',               'id' => 'opal'),
    array('month' => 'November',  'stone' => 'Citrine, topaz',                 'id' => 'citrine'),
    array('month' => 'December',  'stone' => 'Tanzanite, turquoise, blue topaz', 'id' => 'tanzanite')
);

// Helper for initial photo of Sun / Ruby
$first_img_src = isset($gem_imgs['ruby']) ? $gem_imgs['ruby'] : (function_exists('vivaaz_get_img_url') ? vivaaz_get_img_url('ruby.jpg') : get_stylesheet_directory_uri() . '/assets/images/ruby.jpg');
?>

<div id="vivaaz-astro-page" class="vivaaz-astro-page">
  <div class="wrap">
    
    <!-- Breadcrumbs -->
    <div class="crumb">
      <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> › <b>Astrology</b>
    </div>

    <!-- Centered Hero Header -->
    <div class="chero">
      <span class="cap">Indian tradition &amp; Navratna</span>
      <h1 class="h1">Gemstones and astrology</h1>
      <p class="lead">
        In Indian tradition, each of the nine planets has its own gemstone. The right stone, and the right weight, are chosen from your birth chart. We help you in two steps: our astrologer reads your chart, and our gem team finds a natural, certified stone that fits.
      </p>
      <div class="cbtns">
        <button type="button" class="btn" onclick="astroOpenConsultModal()">Book a consultation →</button>
        <button type="button" class="btn o" onclick="astroOpenWhatsApp()">Ask on WhatsApp</button>
      </div>
      <p style="font-size:13px;color:var(--soft);margin:14px 0 0;">
        We share the tradition with respect and promise no result, only an honest stone.
      </p>
    </div>

    <!-- 9 Planet Buttons Row (Centered) -->
    <div class="planets" id="astro-planets-chips">
      <?php foreach ($planets_data as $idx => $p) : ?>
        <button type="button" 
                class="chip lg <?php echo ($idx === 0) ? 'on' : ''; ?>" 
                data-idx="<?php echo esc_attr($idx); ?>" 
                onclick="astroSelectPlanet(<?php echo esc_attr($idx); ?>, this)">
          <?php echo esc_html($p['name'] . ' · ' . $p['stone']); ?>
        </button>
      <?php endforeach; ?>
    </div>

    <!-- Main Active Planet Block Card -->
    <div class="pblock rv" id="astro-active-pblock">
      
      <!-- Left: Stone Image -->
      <div class="st" id="pblock-st-media">
        <img id="pblock-img" src="<?php echo esc_url($first_img_src); ?>" alt="Ruby">
      </div>

      <!-- Center: Details & Action Buttons -->
      <div id="pblock-details">
        <span class="cap" id="pblock-cap">SUN (SURYA)</span>
        <h2 class="h2" id="pblock-title" style="font-size:34px;margin-top:4px;margin-bottom:8px;">Ruby · Manik</h2>
        <p style="color:var(--mute);line-height:1.6;" id="pblock-desc">
          The stone of the Sun, traditionally worn for confidence and leadership. A fine stone for astrology is chosen by colour, clarity and weight, and is sold with its certificate.
        </p>
        <p style="font-size:13.5px;margin:12px 0;" id="pblock-subs">
          <b>Substitute (uparatna):</b> Red garnet, red spinel
        </p>
        
        <div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:16px;">
          <button type="button" class="btn sm" id="pblock-btn-ask" onclick="astroAskCurrentStone()">Ask for this stone</button>
          <button type="button" class="btn sm o" onclick="astroOpenConsultModal()">Talk to our astrologer</button>
        </div>

        <p style="margin-top:14px;" id="pblock-link-wrap">
          <a class="link" id="pblock-link" href="<?php echo esc_url(home_url('/gemstones/?stone=ruby')); ?>">See our rubies →</a>
        </p>
      </div>

      <!-- Right: Wear Specs Table -->
      <div>
        <table class="wear">
          <tbody>
            <tr>
              <td>Weight</td>
              <td id="pblock-spec-weight">3 to 6 ratti (2.7 to 5.5 ct), as advised</td>
            </tr>
            <tr>
              <td>Metal</td>
              <td id="pblock-spec-metal">Gold or copper</td>
            </tr>
            <tr>
              <td>Finger</td>
              <td id="pblock-spec-finger">Ring finger, right hand</td>
            </tr>
            <tr>
              <td>Day</td>
              <td id="pblock-spec-day">Sunday morning</td>
            </tr>
            <tr>
              <td>Certificate</td>
              <td id="pblock-spec-cert" style="color:var(--ok);font-weight:600;">Included</td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>

    <!-- 4 Section Steps Cards -->
    <section class="sec" style="padding-top:40px;padding-bottom:20px;">
      <div class="steps4">
        <div class="rv" id="a-weight" onclick="astroScrollTo('a-weight')" style="cursor:pointer;">
          <b style="font-family:var(--display);font-weight:400;font-size:20px;margin:6px 0;">Weight in ratti</b>
          <span style="font-size:13px;color:var(--mute);">1 ratti = 0.91 carat, shown on every astrology stone.</span>
        </div>
        <div class="rv" id="a-subs" onclick="astroScrollTo('a-subs')" style="cursor:pointer;">
          <b style="font-family:var(--display);font-weight:400;font-size:20px;margin:6px 0;">Substitute stones</b>
          <span style="font-size:13px;color:var(--mute);">Same planet, lower budget.</span>
        </div>
        <div class="rv" id="a-nav" onclick="astroScrollTo('a-nav')" style="cursor:pointer;">
          <b style="font-family:var(--display);font-weight:400;font-size:20px;margin:6px 0;">Navratna</b>
          <span style="font-size:13px;color:var(--mute);">Nine stones, made on request.</span>
        </div>
        <div class="rv" id="a-birth" onclick="astroScrollTo('a-birthlist')" style="cursor:pointer;">
          <b style="font-family:var(--display);font-weight:400;font-size:20px;margin:6px 0;">Birthstones by month</b>
          <span style="font-size:13px;color:var(--mute);">January to December.</span>
        </div>
      </div>
    </section>

    <!-- Birthstones by Month Section -->
    <section id="a-birthlist" style="padding-bottom:50px;">
      <div class="sech" style="margin-bottom:20px;">
        <h2 class="h2" style="font-size:32px;font-family:var(--display);font-weight:400;">Birthstones by month</h2>
      </div>
      <div class="bgrid">
        <?php foreach ($birthstones_data as $b) : ?>
          <div>
            <span class="cap"><?php echo esc_html($b['month']); ?></span>
            <b style="font-size:14.5px;font-weight:600;color:var(--ink);"><?php echo esc_html($b['stone']); ?></b>
            <?php if (!empty($b['id'])) : ?>
              <a class="link" style="font-size:12.5px;margin-top:auto;" href="<?php echo esc_url(home_url('/gemstones/?stone=' . $b['id'])); ?>">Shop →</a>
            <?php else : ?>
              <span style="font-size:12.5px;color:var(--soft);margin-top:auto;">Custom</span>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

  </div>
</div>

<!-- ================= CONSULTATION BOOKING MODAL ================= -->
<div id="astro-modal-wrap" style="display:none;">
  <div class="scrim" onclick="astroCloseConsultModal()"></div>
  <div class="modal" role="dialog" aria-label="Book a consultation">
    <button type="button" class="x" onclick="astroCloseConsultModal()" aria-label="Close">
      <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
        <path d="M6.5 6.5l11 11M17.5 6.5l-11 11"/>
      </svg>
    </button>
    
    <div id="astro-modal-form-wrap">
      <h3 style="font-family:var(--display);font-weight:400;font-size:32px;margin:0 0 4px;padding-right:30px;">Book a consultation</h3>
      <p class="sub" style="color:var(--mute);margin-bottom:20px;">We confirm the time of your call on WhatsApp.</p>
      
      <form id="astro-consult-form" onsubmit="astroSubmitConsultForm(event)">
        <div class="fg">
          <div class="f">
            <label for="c-name">Name</label>
            <input id="c-name" placeholder="Your name" required>
          </div>
          <div class="f">
            <label for="c-phone">WhatsApp number</label>
            <input id="c-phone" placeholder="+91" required>
          </div>
          <div class="f">
            <label for="c-dob">Date of birth</label>
            <input id="c-dob" placeholder="DD / MM / YYYY">
          </div>
          <div class="f">
            <label for="c-tob">Time of birth</label>
            <input id="c-tob" placeholder="If known">
          </div>
          <div class="f">
            <label for="c-email">Email</label>
            <input id="c-email" type="email" placeholder="Optional">
          </div>
          <div class="f">
            <label for="c-pob">Place of birth</label>
            <input id="c-pob" placeholder="City, country">
          </div>
          
          <div class="f full">
            <label>I am asking about</label>
            <div class="chips" id="c-about-chips">
              <button type="button" class="chip lg on" onclick="astroSelectPill(this)">Career</button>
              <button type="button" class="chip lg" onclick="astroSelectPill(this)">Health</button>
              <button type="button" class="chip lg" onclick="astroSelectPill(this)">Marriage</button>
              <button type="button" class="chip lg" onclick="astroSelectPill(this)">Wealth</button>
              <button type="button" class="chip lg" onclick="astroSelectPill(this)">Studies</button>
            </div>
          </div>

          <div class="f full">
            <label>Budget for the stone</label>
            <div class="chips" id="c-budget-chips">
              <button type="button" class="chip lg" onclick="astroSelectPill(this)">Under ₹10,000</button>
              <button type="button" class="chip lg on" onclick="astroSelectPill(this)">₹10,000–50,000</button>
              <button type="button" class="chip lg" onclick="astroSelectPill(this)">₹50,000+</button>
            </div>
          </div>
        </div>

        <div class="note" style="margin-top:14px;background:var(--sand);font-size:12.5px;padding:11px 14px;color:#4a443d;">
          Paid consultation. You see the fee and pay online, then we confirm the time on WhatsApp.
        </div>
        
        <button type="submit" class="btn wide" style="margin-top:16px;">Book a consultation</button>
      </form>
    </div>

    <!-- Done Confirmation Screen -->
    <div id="astro-modal-done-wrap" style="display:none;text-align:center;padding:20px 0;">
      <div class="tick" style="width:56px;height:56px;border-radius:50%;background:var(--ok);color:#fff;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;font-size:26px;">✓</div>
      <h3 style="font-family:var(--display);font-weight:400;font-size:28px;margin:0 0 6px;">Thank you.</h3>
      <p class="sub" style="color:var(--mute);margin-bottom:20px;">We have received your consultation request and will confirm the call details with you on WhatsApp.</p>
      <button type="button" class="btn" onclick="astroCloseConsultModal()">Done</button>
    </div>

  </div>
</div>

<!-- ================= STYLES ================= -->
<style>
:root {
  --bg: #FAF7F2;
  --paper: #FFFFFF;
  --ink: #1C1A17;
  --mute: #76706A;
  --soft: #9A9186;
  --line: #E8E1D6;
  --line2: #DDD3C5;
  --gold: #9B7C4E;
  --gold2: #B8955F;
  --sand: #F1EBE1;
  --ok: #3E7B4F;
  --warn: #C2412D;
  --display: 'Playfair Display', Georgia, 'Times New Roman', serif;
  --body: 'Manrope', 'Segoe UI', Helvetica, Arial, sans-serif;
  color-scheme: light;
}

#vivaaz-astro-page {
  background: var(--bg);
  color: var(--ink);
  font-family: var(--body);
  font-size: 14px;
  line-height: 1.55;
  padding-bottom: 80px;
  min-height: 80vh;
}

#vivaaz-astro-page * {
  box-sizing: border-box;
}

#vivaaz-astro-page button {
  cursor: pointer;
  background: none;
  border: 0;
  padding: 0;
  font: inherit;
  color: inherit;
}

#vivaaz-astro-page a {
  color: inherit;
  text-decoration: none;
  cursor: pointer;
}

#vivaaz-astro-page .wrap {
  max-width: 1280px;
  margin: 0 auto;
  padding-left: max(24px, env(safe-area-inset-left, 0px));
  padding-right: max(24px, env(safe-area-inset-right, 0px));
}

#vivaaz-astro-page .crumb {
  font-size: 12.5px;
  color: var(--soft);
  display: flex;
  gap: 8px;
  align-items: center;
  flex-wrap: wrap;
  padding-top: 28px;
}
#vivaaz-astro-page .crumb a:hover { color: var(--ink); }
#vivaaz-astro-page .crumb b { color: var(--ink); font-weight: 500; }

#vivaaz-astro-page .cap {
  font-size: 10.5px;
  letter-spacing: .2em;
  color: var(--gold);
  font-weight: 700;
  text-transform: uppercase;
}

#vivaaz-astro-page .chero {
  text-align: center;
  max-width: 760px;
  margin: 26px auto 10px;
}
#vivaaz-astro-page .h1 {
  font-family: var(--display);
  font-weight: 400;
  font-size: clamp(34px, 4.2vw, 48px);
  line-height: 1.1;
  margin: 8px 0 14px;
  color: var(--ink);
}
#vivaaz-astro-page .lead {
  color: var(--mute);
  font-size: 15px;
  line-height: 1.6;
  margin: 0 auto;
}
#vivaaz-astro-page .cbtns {
  display: flex;
  gap: 12px;
  justify-content: center;
  flex-wrap: wrap;
  margin-top: 24px;
}

#vivaaz-astro-page .planets {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin: 28px 0;
  justify-content: center;
}

#vivaaz-astro-page .chip {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  border: 1px solid var(--line2);
  border-radius: 999px;
  padding: 6px 13px;
  font-size: 12.5px;
  background: var(--paper);
  color: #3b362f;
  transition: all .15s;
  white-space: nowrap;
}
#vivaaz-astro-page .chip:hover {
  border-color: var(--ink);
}
#vivaaz-astro-page .chip.on {
  background: var(--ink);
  color: var(--paper);
  border-color: var(--ink);
}
#vivaaz-astro-page .chip.lg {
  padding: 9px 18px;
  font-size: 13px;
}

#vivaaz-astro-page .pblock {
  background: var(--paper);
  border: 1px solid var(--line);
  display: grid;
  grid-template-columns: 240px minmax(0,1fr) 300px;
  gap: 32px;
  padding: 30px;
  align-items: start;
  margin-top: 10px;
}
#vivaaz-astro-page .pblock .st {
  aspect-ratio: 1/1;
  background: #F1F0EE;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}
#vivaaz-astro-page .pblock .st img {
  width: 66%;
  height: auto;
  object-fit: contain;
  transition: transform .4s;
}
#vivaaz-astro-page .pblock:hover .st img {
  transform: scale(1.06);
}

#vivaaz-astro-page .wear {
  width: 100%;
  border-collapse: collapse;
  font-size: 13px;
}
#vivaaz-astro-page .wear td {
  padding: 8px 0;
  border-bottom: 1px solid var(--line);
  vertical-align: top;
}
#vivaaz-astro-page .wear td:first-child {
  color: var(--soft);
  width: 38%;
}

#vivaaz-astro-page .steps4 {
  display: grid;
  grid-template-columns: repeat(4, minmax(0,1fr));
  gap: 18px;
}
#vivaaz-astro-page .steps4 div {
  background: var(--paper);
  border: 1px solid var(--line);
  padding: 22px;
  transition: transform .2s, box-shadow .2s;
}
#vivaaz-astro-page .steps4 div:hover {
  box-shadow: 0 10px 24px rgba(28,26,23,.06);
  transform: translateY(-2px);
}

#vivaaz-astro-page .bgrid {
  display: grid;
  grid-template-columns: repeat(6, minmax(0,1fr));
  gap: 12px;
}
#vivaaz-astro-page .bgrid > div {
  background: var(--paper);
  border: 1px solid var(--line);
  padding: 14px;
  display: flex;
  flex-direction: column;
  gap: 6px;
  font-size: 13.5px;
  transition: box-shadow .2s;
}
#vivaaz-astro-page .bgrid > div:hover {
  box-shadow: 0 8px 20px rgba(28,26,23,.06);
}

#vivaaz-astro-page .btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  background: var(--ink);
  color: var(--paper);
  padding: 14px 26px;
  font-size: 12px;
  letter-spacing: .16em;
  font-weight: 700;
  text-transform: uppercase;
  border: 1px solid var(--ink);
  transition: background .2s;
}
#vivaaz-astro-page .btn:hover {
  background: #3a352f;
}
#vivaaz-astro-page .btn.o {
  background: transparent;
  color: var(--ink);
}
#vivaaz-astro-page .btn.o:hover {
  background: var(--ink);
  color: var(--paper);
}
#vivaaz-astro-page .btn.sm {
  padding: 10px 18px;
  font-size: 11px;
}
#vivaaz-astro-page .btn.wide {
  width: 100%;
}
#vivaaz-astro-page .link {
  color: var(--gold);
  text-decoration: underline;
  text-underline-offset: 3px;
  font-weight: 600;
}

/* Modals */
.scrim {
  position: fixed;
  inset: 0;
  background: rgba(28,26,23,.5);
  z-index: 99998;
  animation: fade .2s;
}
@keyframes fade { from { opacity: 0; } }

.modal {
  position: fixed;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
  width: min(640px, calc(100% - 32px));
  max-height: calc(100% - 48px);
  overflow: auto;
  background: #FFFDF9;
  z-index: 99999;
  padding: 34px 40px 30px;
  box-shadow: 0 30px 80px rgba(0,0,0,.3);
  animation: pop .25s ease;
}
@keyframes pop { from { opacity: 0; transform: translate(-50%,-46%); } }

.modal .x {
  position: absolute;
  right: 22px;
  top: 22px;
  border: 0;
  background: none;
  cursor: pointer;
}
.modal .x svg {
  width: 18px;
  height: 18px;
}
.fg {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px 14px;
}
.fg .full {
  grid-column: 1/-1;
}
.f label {
  display: block;
  font-size: 10.5px;
  letter-spacing: .18em;
  font-weight: 700;
  margin-bottom: 6px;
  text-transform: uppercase;
}
.f input, .f select, .f textarea {
  width: 100%;
  border: 1px solid #D9CFC0;
  height: 44px;
  padding: 0 13px;
  background: var(--paper);
  font: inherit;
  color: inherit;
}
.f textarea {
  height: 80px;
  padding: 10px 13px;
  resize: vertical;
}

/* Responsive */
@media (max-width: 1000px) {
  #vivaaz-astro-page .pblock {
    grid-template-columns: minmax(0, 1fr);
  }
  #vivaaz-astro-page .steps4 {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
  #vivaaz-astro-page .bgrid {
    grid-template-columns: repeat(3, minmax(0, 1fr));
  }
}
@media (max-width: 640px) {
  #vivaaz-astro-page .steps4 {
    grid-template-columns: 1fr;
  }
  #vivaaz-astro-page .bgrid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
  #vivaaz-astro-page .modal {
    padding: 24px 20px;
  }
  #vivaaz-astro-page .fg {
    grid-template-columns: 1fr;
  }
}
</style>

<!-- ================= JAVASCRIPT ================= -->
<script src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/js/jewelry-art.js'); ?>"></script>
<script>
(function() {
  const PLANETS = <?php echo json_encode($planets_data); ?>;
  const gemImgMap = window.VIVAAZ_JEW_IMG || {};

  let currentPlanetIdx = 0;

  // Select Planet Function
  window.astroSelectPlanet = function(idx, btn) {
    currentPlanetIdx = idx;
    const p = PLANETS[idx];
    if (!p) return;

    // Update active pill
    document.querySelectorAll('#astro-planets-chips .chip').forEach(c => c.classList.remove('on'));
    if (btn) btn.classList.add('on');

    // Update Photo
    const stMedia = document.getElementById('pblock-st-media');
    if (p.gem_key === 'pearl') {
      stMedia.innerHTML = '<span style="width:60%;aspect-ratio:1;border-radius:50%;background:radial-gradient(circle at 35% 30%,#fff 0,#f3ece0 40%,#d9cdb8 100%);box-shadow:0 4px 12px rgba(0,0,0,.15);display:inline-block;"></span>';
    } else {
      let rawImg = '';
      if (p.gem_key === 'ruby' || p.gem_key === 'coral') rawImg = gemImgMap.ruby || '';
      else if (p.gem_key === 'sapphire') rawImg = gemImgMap.sapphire || '';
      else if (p.gem_key === 'emerald') rawImg = gemImgMap.emerald || '';
      else if (p.gem_key === 'yellow-sapphire' || p.gem_key === 'white-sapphire') rawImg = gemImgMap.topaz || '';
      else if (p.gem_key === 'garnet') rawImg = gemImgMap.ruby || '';
      else if (p.gem_key === 'cats-eye') rawImg = gemImgMap.moonstone || '';

      if (!rawImg) rawImg = gemImgMap.ruby || '';
      const filterStyle = p.filter ? ' style="filter:' + p.filter + ';"' : '';
      stMedia.innerHTML = '<img id="pblock-img" src="' + rawImg + '" alt="' + p.stone + '"' + filterStyle + '>';
    }

    // Update Info
    document.getElementById('pblock-cap').textContent = p.name.toUpperCase() + ' (' + p.hindi.toUpperCase() + ')';
    document.getElementById('pblock-title').textContent = p.stone + ' · ' + p.hindi_stone;
    document.getElementById('pblock-desc').textContent = 'The stone of ' + (p.name === 'Sun' ? 'the Sun' : p.name) + ', traditionally worn for ' + p.purpose + '. A fine stone for astrology is chosen by colour, clarity and weight, and is sold with its certificate.';
    document.getElementById('pblock-subs').innerHTML = '<b>Substitute (uparatna):</b> ' + p.subs;

    // Update Specs Table
    document.getElementById('pblock-spec-weight').textContent = p.weight;
    document.getElementById('pblock-spec-metal').textContent = p.metal;
    document.getElementById('pblock-spec-finger').textContent = p.finger;
    document.getElementById('pblock-spec-day').textContent = p.day;

    // Update Link
    const linkEl = document.getElementById('pblock-link');
    if (p.link_text) {
      document.getElementById('pblock-link-wrap').style.display = 'block';
      linkEl.textContent = p.link_text;
      linkEl.href = p.link_url;
    } else {
      document.getElementById('pblock-link-wrap').style.display = 'none';
    }
  };

  // Ask for Current Stone on WhatsApp
  window.astroAskCurrentStone = function() {
    const p = PLANETS[currentPlanetIdx];
    const msg = 'Hi Vivaaz Gems! I would like to inquire about an astrology stone for ' + p.name + ' (' + p.stone + ' / ' + p.hindi_stone + '). Please share certified options with photos and prices.';
    const waUrl = 'https://wa.me/919680552270?text=' + encodeURIComponent(msg);
    window.open(waUrl, '_blank');
  };

  // Open WhatsApp General
  window.astroOpenWhatsApp = function() {
    const msg = 'Hi Vivaaz Gems! I would like to talk to your team about natural certified astrology gemstones.';
    const waUrl = 'https://wa.me/919680552270?text=' + encodeURIComponent(msg);
    window.open(waUrl, '_blank');
  };

  // Scroll to section helper
  window.astroScrollTo = function(id) {
    const el = document.getElementById(id);
    if (el) el.scrollIntoView({ behavior: 'smooth', block: 'center' });
  };

  // Consultation Modal
  window.astroOpenConsultModal = function() {
    document.getElementById('astro-modal-form-wrap').style.display = 'block';
    document.getElementById('astro-modal-done-wrap').style.display = 'none';
    document.getElementById('astro-modal-wrap').style.display = 'block';
  };

  window.astroCloseConsultModal = function() {
    document.getElementById('astro-modal-wrap').style.display = 'none';
  };

  window.astroSelectPill = function(btn) {
    const parent = btn.parentElement;
    parent.querySelectorAll('.chip').forEach(c => c.classList.remove('on'));
    btn.classList.add('on');
  };

  window.astroSubmitConsultForm = function(e) {
    e.preventDefault();
    const name = document.getElementById('c-name').value;
    const phone = document.getElementById('c-phone').value;
    const dob = document.getElementById('c-dob').value;
    const tob = document.getElementById('c-tob').value;
    const pob = document.getElementById('c-pob').value;
    
    const aboutEl = document.querySelector('#c-about-chips .chip.on');
    const budgetEl = document.querySelector('#c-budget-chips .chip.on');
    const about = aboutEl ? aboutEl.textContent : 'Career';
    const budget = budgetEl ? budgetEl.textContent : '₹10,000–50,000';

    const msg = 'Hi Vivaaz Gems! I would like to book an astrology consultation.\n' +
                'Name: ' + name + '\n' +
                'Phone: ' + phone + '\n' +
                (dob ? 'DOB: ' + dob + '\n' : '') +
                (tob ? 'Time: ' + tob + '\n' : '') +
                (pob ? 'Place: ' + pob + '\n' : '') +
                'Topic: ' + about + '\n' +
                'Budget: ' + budget;

    const waUrl = 'https://wa.me/919680552270?text=' + encodeURIComponent(msg);

    // Switch to done screen in modal
    document.getElementById('astro-modal-form-wrap').style.display = 'none';
    document.getElementById('astro-modal-done-wrap').style.display = 'block';

    // Open WhatsApp
    window.open(waUrl, '_blank');
  };

})();
</script>

<?php
get_footer('shop');
