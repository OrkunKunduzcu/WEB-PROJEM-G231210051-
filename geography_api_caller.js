const factsApiUrl = 'https://uselessfacts.jsph.pl/api/v2/facts/random?language=en';
const apiDataPlaceholderGeo = document.getElementById('api-data-placeholder-geo');

async function fetchRandomFactForGeoPage() {
    if (!apiDataPlaceholderGeo) {
        console.error('API gösterim alanı (api-data-placeholder-geo) bulunamadı.');
        return;
    }
    apiDataPlaceholderGeo.innerHTML = '<div class="spinner-border spinner-border-sm text-light" role="status"><span class="visually-hidden">Yükleniyor...</span></div> Yükleniyor...';
    
    try {
        const response = await fetch(factsApiUrl);
        if (!response.ok) {
            throw new Error(`API Hatası: ${response.status}`);
        }
        const data = await response.json();
        
        if (data && data.text) {
            apiDataPlaceholderGeo.innerHTML = `
                <blockquote class="blockquote mb-0">
                    <p>"${data.text}"</p>
                </blockquote>
                <footer class="blockquote-footer mt-1">
                    <cite title="Useless Facts API"><a href="${data.source_url || 'https://uselessfacts.jsph.pl/'}" target="_blank" class="text-white-50">${data.source || 'Useless Facts API'}</a></cite>
                </footer>
            `;
        } else {
            apiDataPlaceholderGeo.textContent = 'İlginç bilgi formatı beklenildiği gibi değil.';
        }
    } catch (error) {
        console.error('Rastgele bilgi API hatası:', error);
        apiDataPlaceholderGeo.textContent = 'Bilgi yüklenirken bir sorun oluştu. Lütfen daha sonra tekrar deneyin.';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    fetchRandomFactForGeoPage();
});