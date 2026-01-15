import React from 'react';

type Subscription = {
  planName?: string;
  status?: string;
  startedAt?: string;
} | null;

type Payment = {
  id: number;
  amount: number;
  currency: string;
  status: string;
  createdAt: string;
};

const Dashboard = ({
  subscription,
  payments,
}: {
  subscription: Subscription;
  payments: Payment[];
}) => {
    return (
        <div>
            <h1>Billing</h1>

      <section>
        <h2>Subscription</h2>
        {subscription ? (
          <ul>
            <li>Plan: {subscription.planName}</li>
            <li>Status: {subscription.status}</li>
            <li>Started At: {subscription.startedAt}</li>
          </ul>
        ) : (
          <p>No active subscription</p>
        )}
      </section>

      <section>
        <h2>Payments</h2>
        {payments.length === 0 ? (
          <p>No payments found</p>
        ) : (
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              {payments.map(p => (
                <tr key={p.id}>
                  <td>{p.id}</td>
                  <td>{p.amount / 100} {p.currency.toUpperCase()}</td>
                  <td>{p.status}</td>
                  <td>{p.createdAt}</td>
                </tr>
              ))}
            </tbody>
          </table>
        )}
      </section>
        </div>
    );
};

export default Dashboard;