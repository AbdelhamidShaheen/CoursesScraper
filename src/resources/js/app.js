// ─── Scraper progress ───────────────────────────────────────────────
const startBtn     = document.getElementById('startBtn');
const stopBtn      = document.getElementById('stopBtn');
const progressBar  = document.getElementById('progressBar');
const progressFill = document.getElementById('progressFill');
const progressPct  = document.getElementById('progressPct');
const progressLbl  = document.getElementById('progressLabel');

let scraping = false;
let interval = null;

startBtn?.addEventListener('click', () => {
    if (scraping) return;
    scraping = true;
    progressBar.classList.remove('hidden');
    let pct = 0;

    interval = setInterval(() => {
        pct = Math.min(pct + Math.random() * 7, 100);
        progressFill.style.width = `${pct}%`;
        progressPct.textContent  = `${Math.floor(pct)}%`;

        if (pct >= 100) {
            clearInterval(interval);
            progressLbl.textContent = 'اكتمل الجمع! ✓';
            scraping = false;
        }
    }, 300);
});

stopBtn?.addEventListener('click', () => {
    scraping = false;
    clearInterval(interval);
    progressBar.classList.add('hidden');
    progressFill.style.width = '0%';
    progressPct.textContent  = '0%';
    progressLbl.textContent  = 'جاري الجمع...';
});

// ─── Filter tabs ─────────────────────────────────────────────────────
const filterTabs = document.getElementById('filterTabs');
const cards      = document.querySelectorAll('.course-card');

filterTabs?.addEventListener('click', (e) => {
    const btn = e.target.closest('.filter-btn');
    if (!btn) return;

    // Toggle active state
    filterTabs.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    const filter = btn.dataset.filter;

    cards.forEach(card => {
        const show = filter === 'all' || card.dataset.category === filter;
        card.style.display = show ? '' : 'none';
    });
});

// ─── Pagination ───────────────────────────────────────────────────────
document.querySelectorAll('.page-btn[data-page]').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.page-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        // Wire up real pagination here
    });
});
