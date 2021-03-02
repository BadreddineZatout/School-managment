$('document').ready(function(){
    $.ajax({
        type: "GET",
        url: "/?action=getArticle",
        success: function (response) {
            buildArticles(JSON.parse(response));
        }
    });
});

function buildArticles(rows){
    $('#article-body').html('');
    for (let row of rows) {
        let tr = $('<tr></tr>');
        let titre = $('<td></td>').text(row.titre);
        let contenu = $('<td></td>').text(row.contenu);
        let img = $('<img>');
        img.attr('src', row.image);
        img.attr('height', '300px');
        img.attr('width', '300px');
        let image = $('<td></td>');
        image.append(img);
        let maj = $('<td></td>');
        maj.append(update_btn());
        let supp = $('<td></td>');
        supp.append(delete_btn());
        tr.append(titre);
        tr.append(contenu);
        tr.append(image);
        tr.append(maj);
        tr.append(supp);
        $('#article-body').append(tr);
    }
}
function update_btn(){
    let update = $('<button></button>').text('Modifier');
    update.addClass('btn');
    update.css('background-color', '#E27802');
    update.css('color', 'white');

    return update;
}

function delete_btn(){
    let del = $('<button></button>').text('Supprimer');
    del.addClass('btn');
    del.css('background-color', '#E27802');
    del.css('color', 'white');

    return del;
}