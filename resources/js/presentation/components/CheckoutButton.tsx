import { router } from '@inertiajs/react';
import React from 'react';
import axios from 'axios';

const CheckoutButton = ({plan}) => {
    const subscribe = async () => {
        const response = await axios.post('/billing/checkout', {
            plan_name: plan.name,
            amount: plan.price,
            currency: plan.currency,
            planId: plan.id,
            'gateway': 'stripe',
        });
        // Handle response (e.g., redirect to checkout page)
        window.location.href = response.data.checkout_url;
    }
    return (
        <button onClick={subscribe} style={{padding: '10px 20px', backgroundColor: '#6772e5', color: '#fff', border: 'none', borderRadius: '4px', cursor: 'pointer'}}
    >
      Subscribe
    </button>
    );
};

export default CheckoutButton;