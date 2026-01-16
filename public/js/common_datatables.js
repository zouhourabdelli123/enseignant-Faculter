(() => {
    const initCommonDataTables = () => {
        if (!window.jQuery || !jQuery.fn || !jQuery.fn.DataTable) {
            return;
        }

        const defaultOptions = {
            pageLength: 10,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Tous"]],
            order: [],
            language: {
                lengthMenu: "Afficher _MENU_ entrees par page",
                zeroRecords: "Aucun resultat trouve",
                info: "Page _PAGE_ sur _PAGES_",
                infoEmpty: "Aucune donnee disponible",
                infoFiltered: "(filtre de _MAX_ entrees au total)",
                search: "Rechercher:",
                paginate: {
                    first: "Premier",
                    last: "Dernier",
                    next: "Suivant",
                    previous: "Precedent"
                }
            }
        };

        jQuery("table.display").each(function () {
            if (jQuery.fn.DataTable.isDataTable(this)) {
                return;
            }

            jQuery(this).DataTable(defaultOptions);
        });
    };

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", initCommonDataTables);
    } else {
        initCommonDataTables();
    }
})();
