<div class="d-flex justify-content-between align-items-center mb-4">
  <div><h5 class="fw-bold mb-0">Testimonials</h5><p class="text-muted small mb-0">Client reviews shown on the homepage</p></div>
  <button class="btn btn-primary" onclick="openModal()"><i class="bi bi-plus-lg me-1"></i>Add Testimonial</button>
</div>

<div class="er-card">
  <div class="er-card-body p-0">
    <div id="testi-table">
      <div class="text-center py-5 text-muted"><span class="spinner-border spinner-border-sm me-2"></span>Loading…</div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h6 class="modal-title fw-bold" id="tModalLabel">Add Testimonial</h6><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <input type="hidden" id="t-id">
        <div class="row g-3">
          <div class="col-sm-7"><label class="form-label fw-semibold small">Name <span class="text-danger">*</span></label><input type="text" id="t-name" class="form-control" required></div>
          <div class="col-sm-5"><label class="form-label fw-semibold small">Stars</label><select id="t-stars" class="form-select"><option value="5">★★★★★</option><option value="4">★★★★</option><option value="3">★★★</option></select></div>
          <div class="col-12"><label class="form-label fw-semibold small">Organisation</label><input type="text" id="t-org" class="form-control" placeholder="Title, Company"></div>
          <div class="col-12"><label class="form-label fw-semibold small">Quote <span class="text-danger">*</span></label><textarea id="t-quote" class="form-control" rows="3" required></textarea></div>
          <div class="col-sm-5"><label class="form-label fw-semibold small">Avatar Colour</label><input type="color" id="t-color" class="form-control form-control-color w-100" value="#1a56db"></div>
          <div class="col-sm-4"><label class="form-label fw-semibold small">Sort Order</label><input type="number" id="t-order" class="form-control" value="0" min="0"></div>
          <div class="col-sm-3"><label class="form-label fw-semibold small">Status</label><select id="t-status" class="form-select"><option value="active">Active</option><option value="inactive">Inactive</option></select></div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button id="t-save-btn" onclick="saveTesti()" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<script>
function escHtml(s){return String(s||'').replace(/[&<>"']/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));}
let tModal;

async function loadTestis() {
  const res = await ER.get('admin/testimonials');
  if (!res.success) { ER.toast(res.message,'error'); return; }
  const rows = res.data || [];
  if (!rows.length) {
    document.getElementById('testi-table').innerHTML='<div class="text-center py-5 text-muted"><i class="bi bi-chat-quote fs-1 d-block mb-2 opacity-25"></i>No testimonials yet.</div>';
    return;
  }
  document.getElementById('testi-table').innerHTML=`
    <table class="table er-tbl mb-0">
      <thead><tr><th class="px-4">Name / Org</th><th>Quote</th><th>Stars</th><th>Status</th><th class="text-end pe-4">Actions</th></tr></thead>
      <tbody>${rows.map(t=>`
        <tr>
          <td class="px-4">
            <div class="d-flex align-items-center gap-2">
              <div style="width:32px;height:32px;border-radius:50%;background:${escHtml(t.avatar_color)};display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:.8rem;flex-shrink:0;">${escHtml(t.avatar_initial)}</div>
              <div><div class="fw-semibold" style="font-size:.83rem;">${escHtml(t.name)}</div><div class="text-muted" style="font-size:.74rem;">${escHtml(t.org)}</div></div>
            </div>
          </td>
          <td style="max-width:260px;font-size:.8rem;color:#475569;overflow:hidden;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;">${escHtml(t.quote)}</td>
          <td>${'★'.repeat(t.stars)}</td>
          <td>${t.status==='active'?'<span class="ba">Active</span>':'<span class="bi2">Inactive</span>'}</td>
          <td class="text-end pe-4">
            <button onclick='editTesti(${JSON.stringify(t)})' class="btn btn-sm btn-outline-primary py-0 px-2 me-1">Edit</button>
            <button onclick="delTesti(${t.id})" class="btn btn-sm btn-outline-danger py-0 px-2">Delete</button>
          </td>
        </tr>`).join('')}
      </tbody>
    </table>`;
}

function openModal(t=null){
  document.getElementById('tModalLabel').textContent = t ? 'Edit Testimonial':'Add Testimonial';
  document.getElementById('t-id').value    = t ? t.id:'';
  document.getElementById('t-name').value  = t ? t.name:'';
  document.getElementById('t-org').value   = t ? t.org:'';
  document.getElementById('t-quote').value = t ? t.quote:'';
  document.getElementById('t-stars').value = t ? t.stars:5;
  document.getElementById('t-color').value = t ? t.avatar_color:'#1a56db';
  document.getElementById('t-order').value = t ? t.sort_order:0;
  document.getElementById('t-status').value= t ? t.status:'active';
  tModal = tModal || new bootstrap.Modal(document.getElementById('tModal'));
  tModal.show();
}
function editTesti(t){ openModal(t); }

async function saveTesti(){
  const name = document.getElementById('t-name').value.trim();
  if(!name){ ER.toast('Name is required','error'); return; }
  const btn = document.getElementById('t-save-btn');
  ER.loading(btn,true);
  const id = document.getElementById('t-id').value;
  const body = { name, org:document.getElementById('t-org').value.trim(), quote:document.getElementById('t-quote').value.trim(), stars:parseInt(document.getElementById('t-stars').value), avatar_color:document.getElementById('t-color').value, sort_order:parseInt(document.getElementById('t-order').value), status:document.getElementById('t-status').value };
  const res = id ? await ER.put('admin/testimonials/'+id,body) : await ER.post('admin/testimonials',body);
  ER.loading(btn,false);
  if(res.success){ ER.toast(id?'Testimonial updated':'Testimonial added'); bootstrap.Modal.getInstance(document.getElementById('tModal'))?.hide(); loadTestis(); }
  else ER.toast(res.message,'error');
}

async function delTesti(id){
  if(!ER.confirm('Delete this testimonial?')) return;
  const res = await ER.delete('admin/testimonials/'+id);
  if(res.success){ ER.toast('Deleted'); loadTestis(); }
  else ER.toast(res.message,'error');
}

loadTestis();
</script>
