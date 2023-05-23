import { computed, isRef } from "vue";

export const userMonthlyPayment = (total, rate, duration) => {
    const getMonthlyPayment = computed(() => {
        const price = isRef(total) ? total.value : total;
        const monthlyInterest = (isRef(rate) ? rate.value : rate) / 100 / 12;
        const numberOfPaymentMonths =
            (isRef(duration) ? duration.value : duration) * 12;

        return (
            (price *
                monthlyInterest *
                Math.pow(1 + monthlyInterest, numberOfPaymentMonths)) /
            (Math.pow(1 + monthlyInterest, numberOfPaymentMonths) - 1)
        );
    });

    const totalPaid = computed(
        () =>
            (isRef(duration) ? duration.value : duration) *
            12 *
            getMonthlyPayment.value
    );

    const totalInterest = computed(
        () => totalPaid.value - (isRef(total) ? total.value : total)
    );

    return { getMonthlyPayment, totalPaid, totalInterest };
};
