<?php
/**
 * Template Name: Custom Sizes Page
 * Vivaaz Gems - Custom Sizes Request
 * Strictly follows the Word Content Document and Master PDF Brief.
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="luxury-page-wrapper" style="background: #FAF7F2; padding: 24px 20px 80px; min-height: 80vh;">
  <div class="container" style="max-width: 800px; margin: 0 auto;">
    
    <!-- Breadcrumb (12.5px #9A9186) -->
    <div class="crumb" style="font-size: 12.5px; color: #9A9186; margin-bottom: 24px; display: flex; align-items: center; gap: 8px;">
      <a href="<?php echo esc_url(home_url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a>
      <span>›</span>
      <b style="color: #1C1A17; font-weight: 500;">Custom sizes</b>
    </div>
    
    <div style="text-align: center; margin-bottom: 40px;">
      <span class="cap section-tag-divider" style="letter-spacing: 0.2em; font-size: 10.5px; font-weight: 700; color: #9B7C4E; text-transform: uppercase;">THE TRADE</span>
      <h1 class="font-serif h1" style="font-family: var(--display, 'Playfair Display', Georgia, serif); font-size: 48px; font-weight: 400; margin: 10px 0 14px; color: #1C1A17;">Custom sizes</h1>
      <p style="font-size: 16px; color: #4A4640; max-width: 680px; margin: 0 auto; line-height: 1.8;">
        If the size you need is not on the product page, we can usually cut or source it. Calibrated stones from 1 mm up, in any standard shape, and larger single stones on request.
      </p>
    </div>

    <!-- 4 Facts -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 28px; margin-bottom: 32px;">
      <ul style="list-style: none; padding: 0; margin: 0; font-size: 13px; line-height: 1.8; color: #4A4640; display: flex; flex-direction: column; gap: 8px;">
        <li>◈ Tell us the stone, shape, size and number of pieces.</li>
        <li>◈ We check stock in Jaipur and Bangkok and reply with a price and time. Asking is free.</li>
        <li>◈ Custom cutting normally takes 1 to 3 weeks depending on the quantity.</li>
        <li>◈ Custom sizes are made to order and cannot be returned, so we send photos before dispatch.</li>
      </ul>
    </div>

    <!-- Custom Size Form -->
    <div style="background: #FFFFFF; border: 1px solid #EBE7DF; padding: 36px; margin-bottom: 32px;">
      <h3 class="font-serif" style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; margin: 0 0 20px; color: #1C1A17;">Tell us the size you need</h3>

      <form id="custom-sizes-form" onsubmit="handleCustomSizesSubmit(event)" style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Stone *</label>
          <input type="text" name="stone" required placeholder="e.g. Blue Sapphire, Ruby, Emerald" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Shape *</label>
          <input type="text" name="shape" required placeholder="e.g. Oval, Octagon, Round, Cushion" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Size (mm) *</label>
          <input type="text" name="size_mm" required placeholder="e.g. 7.5 x 5.5 mm or 3.2 mm" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Pieces *</label>
          <input type="number" name="pieces" required placeholder="e.g. 50" min="1" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Your Name *</label>
          <input type="text" name="name" required placeholder="Your name" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Your WhatsApp *</label>
          <input type="tel" name="phone" id="custom-size-phone" required placeholder="+91 98765 43210" oninput="clearCustomSizePhoneErr();" style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;">
          <div id="custom-size-phone-err" style="display: none; color: #C0392B; font-size: 11.5px; margin-top: 4px; font-weight: 600;">Please enter a valid 10-digit mobile number</div>
        </div>

        <div style="grid-column: 1 / -1;">
          <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">Notes</label>
          <textarea name="notes" rows="3" placeholder="Target color, tolerance, or setting requirements..." style="width: 100%; padding: 12px; border: 1px solid #EBE7DF; background: #FAF7F2; font-size: 13px; outline: none;"></textarea>
        </div>

        <div style="grid-column: 1 / -1; margin-top: 8px;">
          <button type="submit" class="btn-square-dark" style="width: 100%; padding: 15px; background: #1C1A17; color: #FFFFFF; font-size: 12px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; border: none; cursor: pointer;">
            ASK FOR THIS SIZE →
          </button>
        </div>
      </form>
    </div>

  </div>
</div>


<script>
function clearCustomSizePhoneErr() {
  var errEl = document.getElementById('custom-size-phone-err');
  var phoneInput = document.getElementById('custom-size-phone');
  if (errEl) errEl.style.display = 'none';
  if (phoneInput) {
    phoneInput.style.borderColor = '#EBE7DF';
    phoneInput.style.background = '#FAF7F2';
  }
}

function handleCustomSizesSubmit(e) {
  e.preventDefault();
  var form = e.target;
  var phone = (form.phone ? form.phone.value : '').trim();
  var phoneInput = form.phone || document.getElementById('custom-size-phone');
  var phoneErr = document.getElementById('custom-size-phone-err');

  var isValidPhone = (typeof isValidVivaazPhone === 'function') 
    ? isValidVivaazPhone(phone) 
    : (phone.replace(/\D/g, '').length >= 10 && phone.replace(/\D/g, '').length <= 15 && !/^(\d)\1{9,}$/.test(phone.replace(/\D/g, '')));

  if (!isValidPhone) {
    if (phoneErr) phoneErr.style.display = 'block';
    if (phoneInput) {
      phoneInput.focus();
      phoneInput.style.borderColor = '#C0392B';
      phoneInput.style.background = '#FFF5F5';
    }
    return;
  }

  if (phoneErr) phoneErr.style.display = 'none';
  if (phoneInput) {
    phoneInput.style.borderColor = '#EBE7DF';
    phoneInput.style.background = '#FAF7F2';
  }

  var stone = form.stone ? form.stone.value : '';
  var shape = form.shape ? form.shape.value : '';
  var size = form.size_mm ? form.size_mm.value : '';
  var pieces = form.pieces ? form.pieces.value : '';
  var name = form.name.value;
  var notes = form.notes ? form.notes.value : '';

  var msg = 'Hi Vivaaz Gems! Custom Sizes Request:\n' +
            'Stone: ' + stone + '\n' +
            'Shape: ' + shape + '\n' +
            'Size: ' + size + '\n' +
            'Pieces: ' + pieces + '\n' +
            'Name: ' + name + '\n' +
            'WhatsApp: ' + phone + '\n' +
            (notes ? 'Notes: ' + notes : '');

  // Dispatch AJAX email
  var formData = new FormData();
  formData.append('action', 'vivaaz_send_enquiry');
  formData.append('type', 'Custom Sizes Request: ' + stone);
  formData.append('name', name);
  formData.append('phone', phone);
  formData.append('stone', stone);
  formData.append('size', size);
  formData.append('pieces', pieces);
  formData.append('details', 'Shape: ' + shape + ' | ' + notes);

  fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
    method: 'POST',
    body: formData
  }).catch(function(){});

  form.innerHTML = '<div style="padding:30px; text-align:center;"><div style="width:50px;height:50px;border-radius:50%;background:#1E9E52;color:#fff;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;font-size:24px;">✓</div><h3 style="font-size:22px;margin:0 0 6px;color:#1C1A17;">Request sent</h3><p style="color:#76706A;font-size:13.5px;margin:0;">Thank you! We have received your custom size request and opened WhatsApp to confirm with our team.</p></div>';

  window.open('https://wa.me/919680552270?text=' + encodeURIComponent(msg), '_blank');
}
</script>

<?php
get_footer('shop');
