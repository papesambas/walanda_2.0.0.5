select2Function();

function select2Function() {
    $(function () {
        $(".select-Meretelephone").select2({
            tags: true,
            tokenSeparators: [',', '  '],
            placeholder: 'Entrez un # de téléphone ',
            allowClear: true,
        }).on('change', function (e) {
            let label = $(this).find("[data-select2-tag=true]");
            let telephoneId = $(this).val();
            if (label.length == 1) {
                labelVal = label.val();
                if (labelVal) {
                    let labelLength = labelVal.length;
                    if (labelLength == 12 && $.inArray(label.val(), $(this).val() !== -1)) {
                        $.ajax({
                            url: "/telephones/ajout/ajax/" + label.val(),
                            type: "POST",
                        }).done(function (data) {
                            label.replaceWith(`<option selected value="${data.id}">${label.val()}</option>`);
                            $('#parents_recherche_mere_telephone').empty().append($('<option></option>').attr('value', data.id).text(label.val()));
                        })
                    } else {
                        alert("Le numéro de téléphone du mère doit avoir au moins 12 caractères.");
                    }
                }
            }

            if (label.length == 0 && $.inArray(label.val(), $(this).val() !== -1)) {
                $.ajax({
                    url: "/meres/telephones/search/ajax/" + telephoneId,
                    type: "POST",
                }).done(function (data) {
                    if (data.error) {
                        alert(data.error);
                        $('#parents_recherche_mere_nom').select2("destroy").empty().select2();
                        $('#parents_recherche_mere_prenom').select2("destroy").empty().select2();
                        $('#parents_recherche_mere_profession').select2("destroy").empty().select2();
                        $('#parents_recherche_mere_telephone').empty().append($('<option></option>').attr('value', data.telephoneId).text(data.telephone));
                        $('#parents_recherche_mere_nina').select2("destroy").empty().select2();
                    } else {
                        if (data.mereId !== null) {
                            $('#parents_recherche_mere_nom').empty().append($('<option></option>').attr('value', data.nomId).text(data.nom));
                            $('#parents_recherche_mere_prenom').empty().append($('<option></option>').attr('value', data.prenomId).text(data.prenom));
                            $('#parents_recherche_mere_profession').empty().append($('<option></option>').attr('value', data.professionId).text(data.profession));
                            $('#parents_recherche_mere_telephone').empty().append($('<option></option>').attr('value', data.telephoneId).text(data.telephone));
                            $('#parents_recherche_mere_nina').empty().append($('<option></option>').attr('value', data.ninaId).text(data.nina));
                        } else {
                            // Récupérer le numéro dans le champ #parents_recherche_mere_telephone
                            $('#parents_recherche_mere_telephone').empty().append($('<option></option>').attr('value', data.telephoneId).text(data.telephone));
                            // Assurez-vous que le numéro est également défini dans le champ #parents_recherche_mere_numero si nécessaire
                            $('#parents_recherche_mere_numero').val(data.telephone);
                        }
                    }
                })
            }
        });
        // Réinitialiser les champs Select2 lorsque la valeur de #parents_recherche_mere_telephone change
        $('#parents_recherche_SearchMere').on('change', function () {
            $('#parents_recherche_mere_nom').val(null).trigger('change');
            $('#parents_recherche_mere_prenom').val(null).trigger('change');
            $('#parents_recherche_mere_profession').val(null).trigger('change');
            $('#parents_recherche_mere_telephone').val(null).trigger('change');
            $('#parents_recherche_mere_nina').val(null).trigger('change');
        });
    });
}
