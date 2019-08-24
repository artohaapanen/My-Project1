// Hakee artikkelitaulukon id="articles"
const articles = document.getElementById('articles');

// onko olemassa?
if (articles) {
    // On, joten seurataan taulukkoon kohdistuvia hiiren napautuksia
    articles.addEventListener('click', (e) => {
        // Huomautusikkuna
        //alert(2);

        // Onko kohdassa johon napautettiin alla oleva luokka eli kysessä on delete-painike (index.htm.twig)?
        if (e.target.className === 'btn btn-danger delete-article') {
            // Kyllä, joten tulostetaan viesti
            //alert(2);

            // Oletko varma?
            if (confirm('Oletko varma?')) {
                const id = e.target.getAttribute('data-id');    // hakee delete-painikkeen IDn
                //alert(id);

                // Hae route /article/delete/${id} ja sen metodi delete
                fetch(`/article/delete/${id}`, {        // @Route("/article/delete/${id}"")
                    method: 'DELETE'
                }).then(res => window.location.reload());  // kun kaikki on ok (poisto onnistui), ladataa sivu uudelleen
            }
        }
    });
    
}