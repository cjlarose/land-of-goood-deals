$(document).ready(function() {
    function removeCartItem(element) {
        var product_id = element.data("product-id");
        var payload = {
            product_id: product_id
        };

        $.post("removefromcart.php", payload)
            .done(function() {
                element.remove();
            })
            .error(function() {
                throw "Bad response from server";
            });
    };

    $("#cart-items .delete-item").click(function(e) {
        e.preventDefault();
        removeCartItem($(this).closest("tr"));
        return false;
    });
});
