import { loadStripe } from "@stripe/stripe-js";

export default (publishableKey, cardHolderName) => ({
    data: {
        stripe: null,
        cardElement: null,
    },
    async init() {
        this.stripe = await loadStripe(publishableKey);

        var elements = this.stripe.elements();

        var style = {
            base: {
                color: "#32325d",
            },
        };

        const card = elements.create("card", { style });

        card.mount("#card-element");

        this.cardElement = card;
    },
    charge: async function () {
        const { paymentMethod, error } = await this.stripe.createPaymentMethod(
            "card",
            this.cardElement,
            {
                billing_details: { name: cardHolderName },
            }
        );

        var errorElement = document.getElementById("card-errors");

        if (error) {
            errorElement.textContent = error.message;
        } else {
            this.$wire.call("charge", paymentMethod.id);
        }
    },
});
