import Badge from '@/presentation/components/Badge';
import Button from '@/presentation/components/Button';
import Card from '@/presentation/components/Card';
import Table from '@/presentation/components/Table';
import React from 'react';

const AdminDashboard = ({
  subscriptions,
  payments,
}: any) => {
    return (
        <div className="space-y-8">
            <Button
                variant="secondary"
                onClick={() => window.location.href = '/admin/billing/export'}
                >
                Export CSV
            </Button>
            <Card title="Subscriptions">
                <Table headers={['User', 'Plan', 'Status', 'Stripe ID', 'Date']}>
                {subscriptions.map((s: any) => (
                    <tr key={s.id} className="border-b">
                    <td className="px-3 py-2">{s.user_email}</td>
                    <td className="px-3 py-2">{s.plan_name}</td>
                    <td className="px-3 py-2">
                        <Badge label={s.status} />
                    </td>
                    <td className="px-3 py-2 font-mono text-xs">
                        {s.stripe_subscription_id ?? '—'}
                    </td>
                    <td className="px-3 py-2">{s.started_at}</td>
                    </tr>
                ))}
                </Table>
            </Card>

            <Card title="Payments">
                <Table headers={['User', 'Amount', 'Status', 'Stripe Ref', 'Date']}>
                {payments.map((p: any) => (
                    <tr key={p.id} className="border-b">
                    <td className="px-3 py-2">{p.user_email}</td>
                    <td className="px-3 py-2">
                        {p.amount / 100} {p.currency.toUpperCase()}
                    </td>
                    <td className="px-3 py-2">
                        <Badge label={p.status} />
                    </td>
                    <td className="px-3 py-2 font-mono text-xs">
                        {p.stripe_reference}
                    </td>
                    <td className="px-3 py-2">{p.created_at}</td>
                    </tr>
                ))}
                </Table>
            </Card>
        </div>
    );
};

export default AdminDashboard;