select2Function();
function select2Function() {
    $(function () {
        $(".select-niveau").select2();
        $(".select-classes").select2();

        $(".select-nomfamille").select2({
            tags: true,
            tokenSeparators: [',', ' '],
            placeholder: 'Sélectionnez ou entrez un nom ',
            allowClear: true,
        }).on('change', function (e) {
            let label = $(this).find("[data-select2-tag=true]");
            //on vérifie si le label n'est pas déjà à l'intérieur de notre select
            if (label.length && $.inArray(label.val(), $(this).val() !== -1)) {
                //on ajoute le label à notre base de donnée
                $.ajax({
                    url: "/noms/ajout/ajax/" + label.val(),
                    type: "POST",
                }).done(function (data) {
                    //pour l'ajout en ajax on crée un controlleur
                    label.replaceWith(`<option selected value="${data.id}">${label.val()}</option>`);
                })
            }
        });
        $(".select-telephone").select2({
            tags: true,
            tokenSeparators: [',', '  '],
            placeholder: 'Entrez un # de téléphone ',
            allowClear: true,
        }).on('change', function (e) {
            let label = $(this).find("[data-select2-tag=true]");

            // Vérifier si le label existe, s'il a au moins 12 caractères et si sa valeur n'est pas déjà présente dans les sélections actuelles du champ
            if (label.length && label.val().length >= 12 && $.inArray(label.val(), $(this).val() !== -1)) {
                // Effectuer la requête AJAX pour ajouter le nouveau numéro de téléphone à la base de données
                $.ajax({
                    url: "/telephones/ajout/ajax/" + label.val(),
                    type: "POST",
                }).done(function (data) {
                    // Pour l'ajout en AJAX, on crée un contrôleur
                    label.replaceWith(`<option selected value="${data.id}">${label.val()}</option>`);
                })
            } else {
                // Afficher un message d'erreur si le numéro de téléphone ne satisfait pas la condition
                alert("Le numéro de téléphone autre doit avoir au moins 12 caractères.");
            }
        });

        $(".select-prenom").select2({
            tags: true,
            tokenSeparators: [',', '  '],
            placeholder: 'Sélectionnez ou entrez un prénom ',
            allowClear: true,
        }).on('change', function (e) {
            let label = $(this).find("[data-select2-tag=true]");
            //on vérifie si le label n'est pas déjà à l'intérieur de notre select
            if (label.length && $.inArray(label.val(), $(this).val() !== -1)) {
                //on ajoute le label à notre base de donnée
                $.ajax({
                    url: "/prenoms/ajout/ajax/" + label.val(),
                    type: "POST",
                }).done(function (data) {
                    //pour l'ajout en ajax on crée un controlleur
                    label.replaceWith(`<option selected value="${data.id}">${label.val()}</option>`);
                })
            }
        });

        $(".select-region").select2();

        $(".select-cercle").select2();

        $(".select-commune").select2();

        $(".select-lieu").select2();

        $(".select-scolarite").select2();

        $(".select-nina").select2({
            tags: true,
            tokenSeparators: [',', '  '],
            placeholder: 'Entrez un # Nina ',
            allowClear: true,
        }).on('change', function (e) {
            let label = $(this).find("[data-select2-tag=true]");
            //on vérifie si le label n'est pas déjà à l'intérieur de notre select
            if (label.length && $.inArray(label.val(), $(this).val() !== -1)) {
                //on ajoute le label à notre base de donnée
                $.ajax({
                    url: "/ninas/ajout/ajax/" + label.val(),
                    type: "POST",
                }).done(function (data) {
                    //pour l'ajout en ajax on crée un controlleur
                    label.replaceWith(`<option selected value="${data.id}">${label.val()}</option>`);
                })
            }
        });

        $(".select-profession").select2({
            tags: true,
            tokenSeparators: [',', '  '],
            placeholder: 'Sélectionnez ou entrez une Professions ',
            allowClear: true,
        }).on('change', function (e) {
            let label = $(this).find("[data-select2-tag=true]");
            //on vérifie si le label n'est pas déjà à l'intérieur de notre select
            if (label.length && $.inArray(label.val(), $(this).val() !== -1)) {
                //on ajoute le label à notre base de donnée
                $.ajax({
                    url: "/professions/ajout/ajax/" + label.val(),
                    type: "POST",
                }).done(function (data) {
                    //pour l'ajout en ajax on crée un controlleur
                    label.replaceWith(`<option selected value="${data.id}">${label.val()}</option>`);
                })
            }
        });

        $(".select-ecole").select2({
            tags: true,
            tokenSeparators: [',', '  '],
            placeholder: 'Sélectionnez ou entrez école ',
            allowClear: true,
        }).on('change', function (e) {
            let label = $(this).find("[data-select2-tag=true]");
            //on vérifie si le label n'est pas déjà à l'intérieur de notre select
            if (label.length && $.inArray(label.val(), $(this).val() !== -1)) {
                //on ajoute le label à notre base de donnée
                $.ajax({
                    url: "/ecoles/ajout/ajax/" + label.val(),
                    type: "POST",
                }).done(function (data) {
                    //pour l'ajout en ajax on crée un controlleur
                    label.replaceWith(`<option selected value="${data.id}">${label.val()}</option>`);
                })
            }
        });


    });
}
