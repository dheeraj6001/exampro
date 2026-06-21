<div class="d-flex justify-content-between align-items-center mb-4">
  <div><h5 class="fw-bold mb-0">FAQs</h5><p class="text-muted small mb-0">Frequently asked questions shown on the Contact page</p></div>
  <button class="btn btn-primary" onclick="openModal()"><i class="bi bi-plus-lg me-1"></i>Add FAQ</button>
</div>

<div class="er-card">
  <div class="er-card-body p-0">
    <div id="faq-table">
      <div class="text-center py-5 text-muted"><span class="spinner-border spinner-border-sm me-2"></span>Loading…</div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="fModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"><h6 class="modal-title fw-bold" id="fModalLabel">Add FAQ</h6><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <input type="hidden" id="f-id">
        <div class="mb-3"><label class="form-label fw-semibold small">Question <span class="text-danger">*</span></label><input type="text" id="f-question" class="form-control" placeholder="e.g. Is there a free trial?" required></div>
        <div class="mb-3"><label class="form-label fw-semibold small">Answer <span class="text-danger">*</span></label><textarea id="f-answer" class="form-control" rows="4" required></textarea></div>
        <div class="row g-3">
          <div class="col-sm-4"><label class="form-label fw-semibold small">Sort Order</label><input type="number" id="f-order" class="form-control" value="0" min="0"></div>
          <div class="col-sm-4"><label class="form-label fw-semibold small">Status</label><select id="f-status" class="form-select"><option value="active">Active</option><option value="inactive">Inactive</option></select></div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button id="f-save-btn" onclick="saveFaq()" class="btn btn-primary">Save FAQ</button>
      </div>
    </div>
  </div>
</div>

<script>
function escHtml(s){return String(s||'').replace(/[&<>"']/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));}
let fModal;

async function loadFaqs(){
  const res = await ER.get('admin/faqs');
  if(!res.success){ER.toast(res.message,'error');return;}
  const rows = res.data||[];
  if(!rows.length){document.getElementById('faq-table').innerHTML='<div class="text-center py-5 text-muted"><i class="bi bi-question-circle fs-1 d-block mb-2 opacity-25"></i>No FAQs yet.</div>';return;}
  document.getElementById('faq-table').innerHTML=`
    <table class="table er-tbl mb-0">
      <thead><tr><th class="px-4" style="width:36%">Question</th><th>Answer</th><th>Order</th><th>Status</th><th class="text-end pe-4">Actions</th></tr></thead>
      <tbody>${rows.map(f=>`
        <tr>
          <td class="px-4 fw-semibold" style="font-size:.83rem;">${escHtml(f.question)}</td>
          <td style="max-width:280px;font-size:.8rem;color:#475569;overflow:hidden;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;">${escHtml(f.answer)}</td>
          <td>${f.sort_order}</td>
          <td>${f.status==='active'?'<span class="ba">Active</span>':'<span class="bi2">Inactive</span>'}</td>
          <td class="text-end pe-4">
            <button onclick='editFaq(${JSON.stringify(f)})' class="btn btn-sm btn-outline-primary py-0 px-2 me-1">Edit</button>
            <button onclick="delFaq(${f.id})" class="btn btn-sm btn-outline-danger py-0 px-2">Delete</button>
          </td>
        </tr>`).join('')}
      </tbody>
    </table>`;
}

function openModal(f=null){
  document.getElementById('fModalLabel').textContent = f?'Edit FAQ':'Add FAQ';
  document.getElementById('f-id').value       = f?f.id:'';
  document.getElementById('f-question').value = f?f.question:'';
  document.getElementById('f-answer').value   = f?f.answer:'';
  document.getElementById('f-order').value    = f?f.sort_order:0;
  document.getElementById('f-status').value   = f?f.status:'active';
  fModal = fModal || new bootstrap.Modal(document.getElementById('fModal'));
  fModal.show();
}
function editFaq(f){openModal(f);}

async function saveFaq(){
  const q = document.getElementById('f-question').value.trim();
  const a = document.getElementById('f-answer').value.trim();
  if(!q||!a){ER.toast('Question and answer are required','error');return;}
  const btn = document.getElementById('f-save-btn');
  ER.loading(btn,true);
  const id = document.getElementById('f-id').value;
  const body = {question:q,answer:a,sort_order:parseInt(document.getElementById('f-order').value),status:document.getElementById('f-status').value};
  const res = id ? await ER.put('admin/faqs/'+id,body) : await ER.post('admin/faqs',body);
  ER.loading(btn,false);
  if(res.success){ER.toast(id?'FAQ updated':'FAQ added');bootstrap.Modal.getInstance(document.getElementById('fModal'))?.hide();loadFaqs();}
  else ER.toast(res.message,'error');
}

async function delFaq(id){
  if(!ER.confirm('Delete this FAQ?')) return;
  const res = await ER.delete('admin/faqs/'+id);
  if(res.success){ER.toast('Deleted');loadFaqs();}
  else ER.toast(res.message,'error');
}

loadFaqs();
</script>
