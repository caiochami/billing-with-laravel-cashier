import { loadStripe } from "@stripe/stripe-js";

export default (intent, publishableKey, cardHolderName) => ({
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
    subscribe: async function () {
        const { setupIntent, error } = await this.stripe.confirmCardSetup(
            intent.client_secret,
            {
                payment_method: {
                    card: this.cardElement,
                    billing_details: { name: cardHolderName },
                },
            }
        );

        var errorElement = document.getElementById("card-errors");

        if (error) {
            errorElement.textContent = error.message;
        } else {
            this.$wire.call("subscribe", setupIntent.payment_method);
        }
    },
});
