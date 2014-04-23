$(document).ready(function() {
    function removeCartItem(element) {
        var product_id = element.data("product-id");
        var payload = {
            product_id: product_id
        };

        $.post("removefromcart.php", payload)
            .done(function() {
                element.remove();
                updateTotal();
            })
            .error(function() {
                throw "Bad response from server";
            });
    }

    function getTotal() {
        var total = 0;
        $("#cart-items tbody tr[data-line-total]").each(function(i, e) {
            var lineTotal = parseFloat($(e).data('line-total'));
            total += lineTotal;
        });
        return total;
    }

    function updateTotal() {
        var total = getTotal();
        $("#total_price").text("$" + total);
    }

    $("#cart-items .delete-item").click(function(e) {
        e.preventDefault();
        removeCartItem($(this).closest("tr"));
        return false;
    });
});
