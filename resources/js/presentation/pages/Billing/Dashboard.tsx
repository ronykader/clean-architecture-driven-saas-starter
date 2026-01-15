import Badge from '@/presentation/components/Badge';
import Button from '@/presentation/components/Button';
import Card from '@/presentation/components/Card';
import Table from '@/presentation/components/Table';
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
        <div className="space-y-8">
      {/* Subscription */}
      <Card title="Subscription">
        {subscription ? (
          <div className="flex items-center justify-between">
            <div className="space-y-2">
              <p>
                <strong>Plan:</strong> {subscription.planName}
              </p>
              <p>
                <strong>Status:</strong>{' '}
                <Badge label={subscription.status} />
              </p>
              <p>
                <strong>Started:</strong> {subscription.startedAt}
              </p>
            </div>

            {/* Cancel/Resume buttons will go here */}
            <div>
              {subscription.status === 'active' && (
                <Button variant="danger">Cancel Subscription</Button>
              )}
            </div>
          </div>
        ) : (
          <p>No subscription found.</p>
        )}
      </Card>

      {/* Payments */}
      <Card title="Payment History">
        {payments.length === 0 ? (
          <p>No payments yet.</p>
        ) : (
          <Table headers={['ID', 'Amount', 'Status', 'Date']}>
            {payments.map((p: any) => (
              <tr key={p.id} className="border-b last:border-0">
                <td className="px-3 py-2">{p.id}</td>
                <td className="px-3 py-2">
                  {p.amount / 100} {p.currency.toUpperCase()}
                </td>
                <td className="px-3 py-2">
                  <Badge label={p.status} />
                </td>
                <td className="px-3 py-2">{p.createdAt}</td>
              </tr>
            ))}
          </Table>
        )}
      </Card>
    </div>
    );
};

export default Dashboard;