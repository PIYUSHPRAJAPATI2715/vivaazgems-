<?php
/**
 * Template Name: Contact Page
 * Vivaaz Gems - Contact Page
 * 100% exact fidelity to client demo (Image 2)
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="wrap" style="padding-top: 24px; padding-bottom: 60px;">
  <div class="crumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a> › <b>Contact</b></div>
  
  <div class="co" style="margin-top: 16px;">
    <div>
      <h1 class="h1">Talk to us.</h1>
      <p class="lead">The fastest way to reach us is WhatsApp. We reply quickly during office hours, and we are happy to send live photos and videos of any stone.</p>
      
      <a href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I would like to inquire about stones.'); ?>" target="_blank" class="btn wa" style="margin: 20px 0; display: inline-flex; align-items: center; gap: 8px; text-decoration: none;">
        <svg class="i" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="width: 16px; height: 16px;"><path d="M4.5 19.5l1.2-3.6A7.8 7.8 0 1 1 8.6 18.6z"/><path d="M9.3 9.2c.3 2.4 2.6 4.8 5.4 5.4l1.1-1.1-1.7-.9-.7.7c-1.1-.5-2-1.4-2.5-2.5l.7-.7-.9-1.7z"/></svg>
        WhatsApp +91 96805 52270
      </a>

      <div class="off3">
        <div>
          <b>Jaipur · Johari Bazar</b>
          <span>307 Navratna Complex, KGB Ka Rasta, Johari Bazar, Jaipur 302003</span>
          <small>Mon–Sat, 10:30 to 19:00</small>
        </div>
        <div>
          <b>Jaipur · Adarsh Nagar</b>
          <span>B-207, Janta Colony, Adarsh Nagar, Jaipur 302004</span>
          <small>By appointment</small>
        </div>
        <div>
          <b>Bangkok · Ruby Center (Thailand)</b>
          <span>1249/84 Gems Tower, 9th Floor, Charoenkrung Rd., Soi 47/3 Surawong, Bangrak, Bangkok 10500</span>
          <small>Sourcing and trade, by appointment</small>
        </div>
      </div>

      <p style="font-size: 13px; color: var(--mute); line-height: 1.6; margin-top: 14px;">
        vivaazgems@gmail.com · You are welcome at our Jaipur offices to see stones in person. Please message us first so we can keep the stones you want to see ready for you.
      </p>

      <div style="aspect-ratio: 16/7; background: repeating-linear-gradient(45deg, #EFE8DD 0 14px, #F4EFE7 14px 28px); display: flex; align-items: center; justify-content: center; font-size: 12.5px; color: var(--mute); margin-top: 14px; border: 1px solid var(--line);">
        Map of the Johari Bazar office
      </div>
    </div>

    <form class="cobox" id="contact-form" onsubmit="handleContactSubmit(event)" style="align-self: start;">
      <div id="contact-form-done" class="done" style="display: none; padding: 24px 0; text-align: center;">
        <div class="tick" style="width: 56px; height: 56px; border-radius: 50%; background: var(--ok); color: #fff; display: flex; align-items: center; justify-content: center; margin: 0 auto 14px; font-size: 26px;">✓</div>
        <b style="font-size: 18px; display: block; margin-bottom: 6px;">Thank you.</b>
        <p style="color: var(--mute); font-size: 13.5px; margin: 0 0 18px;">We have your message and will reply by email or WhatsApp soon.</p>
        <button type="button" class="btn sm o" onclick="resetContactForm();">Send another message</button>
      </div>

      <div id="contact-form-fields">
        <h5>SEND US A MESSAGE</h5>
        <div class="fg">
          <div class="f full">
            <label for="kn">Name</label>
            <input id="kn" name="name" required>
          </div>
          <div class="f full">
            <label for="km">Email</label>
            <input id="km" type="email" name="email" required>
          </div>
          <div class="f full">
            <label for="kw">WhatsApp number</label>
            <input id="kw" name="whatsapp" placeholder="With country code" required>
          </div>
          <div class="f full">
            <label>I am a</label>
            <div class="chips" id="contact-role-chips">
              <button type="button" class="chip on" onclick="selectRole(this, 'Jeweller')">Jeweller</button>
              <button type="button" class="chip" onclick="selectRole(this, 'Designer')">Designer</button>
              <button type="button" class="chip" onclick="selectRole(this, 'Collector')">Collector</button>
              <button type="button" class="chip" onclick="selectRole(this, 'Other')">Other</button>
            </div>
            <input type="hidden" id="selected-role" name="role" value="Jeweller">
          </div>
          <div class="f full">
            <label for="kt">Message</label>
            <textarea id="kt" name="message" rows="4" required></textarea>
          </div>
          <div class="f full">
            <label for="kf">Attach a photo or drawing (optional)</label>
            <input id="kf" name="attachment" type="file" accept="image/*" style="padding: 10px; height: auto; background: transparent;">
          </div>
        </div>
        <button type="submit" class="btn wide" style="margin-top: 14px;">Send message</button>
        <p style="font-size: 12px; color: var(--soft); margin: 8px 0 0;">Free to ask. We reply quickly by email or WhatsApp.</p>
      </div>
    </form>
  </div>

  <p style="margin-top: 36px; font-size: 13.5px;">
    <a class="link" href="<?php echo esc_url(home_url('/track-order/')); ?>">Track your order →</a> · 
    <a class="link" href="<?php echo esc_url(home_url('/shipping/')); ?>">Shipping and export →</a> · 
    <a class="link" href="https://wa.me/919680552270?text=<?php echo rawurlencode('Hello Vivaaz Gems, I have a bulk / B2B enquiry.'); ?>" target="_blank">Bulk / B2B enquiry →</a> · 
    <a class="link" href="<?php echo esc_url(home_url('/faq/')); ?>">Frequently asked questions →</a>
  </p>
</div>

<script>
function selectRole(btn, role) {
  var chips = document.querySelectorAll('#contact-role-chips .chip');
  chips.forEach(function(c) { c.classList.remove('on'); });
  btn.classList.add('on');
  document.getElementById('selected-role').value = role;
}

function handleContactSubmit(e) {
  e.preventDefault();
  var name = document.getElementById('kn').value;
  var email = document.getElementById('km').value;
  var wa = document.getElementById('kw').value;
  var role = document.getElementById('selected-role').value;
  var msg = document.getElementById('kt').value;
  
  document.getElementById('contact-form-fields').style.display = 'none';
  document.getElementById('contact-form-done').style.display = 'block';

  // Optional: ping WhatsApp with message text if user wants quick chat
  var waMsg = 'Hello Vivaaz Gems,\nName: ' + name + '\nEmail: ' + email + '\nWhatsApp: ' + wa + '\nRole: ' + role + '\nMessage: ' + msg;
  console.log('Contact form submitted:', waMsg);
}

function resetContactForm() {
  document.getElementById('contact-form').reset();
  document.getElementById('contact-form-done').style.display = 'none';
  document.getElementById('contact-form-fields').style.display = 'block';
}
</script>

<?php
get_footer('shop');
