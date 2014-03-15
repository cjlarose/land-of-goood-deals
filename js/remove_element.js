$(document).ready(function() {
    function removeCartItem(element) {
        var product_name = element.find("td:first-child").text();
        var payload = {
            product_name: product_name
        };

        $.post("json/removefromcart.php", payload)
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
