import { router } from '@inertiajs/react';
import React from 'react';

const CheckoutButton = ({plan}) => {
    return (
        <button
      onClick={() =>
        router.post('/billing/checkout', {
          plan_name: plan.name,
          amount: plan.price,
          currency: plan.currency,
        })
      }
    >
      Subscribe
    </button>
    );
};

export default CheckoutButton;