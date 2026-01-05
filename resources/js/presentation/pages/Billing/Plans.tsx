import React from 'react'

type Plan = {
  id: number;
  name: string;
  price: number;
  currency: string;
};

export default function Plans({plans}: {plans: Plan[]}) {
  return (
    <div>
      {plans.map((plan) => (
        <div key={plan.id} style={{border: '1px solid #ccc', padding: '10px', margin: '10px'}}>
          <h2>{plan.name}</h2>
          <p>Price: {plan.price / 100} {plan.currency.toUpperCase()}</p>
        </div>
      ))}
    </div>
  )
}
