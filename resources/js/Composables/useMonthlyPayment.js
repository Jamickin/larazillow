import { computed, isRef } from "vue";

export const useMonthlyPayment = (total, interestRate, duration) => {
    const monthlyPayment = computed(() => {
        const principle = isRef(total) ? total.value : total;
        const monthlyInterest =
            (isRef(interestRate) ? interestRate.value : interestRate) /
            100 /
            12;
        const numberOfPaymentMonths =
            (isRef(duration) ? duration.value : duration) * 12;

        const denominator =
            Math.pow(1 + monthlyInterest, numberOfPaymentMonths) - 1;

        // Check for division by zero and handle it gracefully
        if (Math.abs(denominator) < Number.EPSILON) {
            console.warn(
                "Potential division by zero. Check interest rate and duration."
            );
            return 0; // Or another suitable default value
        }

        return (
            (principle *
                monthlyInterest *
                Math.pow(1 + monthlyInterest, numberOfPaymentMonths)) /
            denominator
        );
    });

    const totalPaid = computed(() => {
        return (
            (isRef(duration) ? duration.value : duration) *
            12 *
            monthlyPayment.value
        );
    });

    const totalInterest = computed(
        () => totalPaid.value - (isRef(total) ? total.value : total)
    );

    return { monthlyPayment, totalPaid, totalInterest };
};
