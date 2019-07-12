$().ready(function(){
    $('#activate_form').click(function(){
        $('#fs1').removeAttr('disabled');
    });
    
    const accessories_properties = ["group", "name", "item_detail", "diameter", "usual_price"];
    const acc_cz = ["Skupina produktu", "Název", "PID", "Průměr", "Obvyklá cena"];
    let out = "";
    
    for (let i = 0; i < accessories_properties.length; i++) {
        out += `<label for="${accessories_properties[i]}">${acc_cz[i]}</label><br>
        <input type="text" name="${accessories_properties[i]}" id="${accessories_properties[i]}"><br>`
    }
    
    //out += "<button id='btn_na'>Uložit</button>";
    $('#fna').append(out);

    let btn = $('<button id="btn_na"></button>').text('ulož');
    $('#na').append(btn);
    $(btn).on('click', function(e){
        e.preventDefault();
        console.log("funguju");
        let group = $('#group').val();
        let name = $('#name').val();
        let item_detail = $('#item_detail').val();
        let diameter = $('#diameter').val();
        let usual_price = $('#usual_price').val();
        let url = `db_handler.php?group=${group}&name=${name}&item_detail=${item_detail}&diameter=${diameter}&usual_price=${usual_price}`;
        $.getJSON(url, function(data){
            $('#db_res').text(data);
        });
    });

});