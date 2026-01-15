import React from 'react';
const colors: Record<string, string> = {
  active: 'bg-green-100 text-green-700',
  pending: 'bg-yellow-100 text-yellow-700',
  cancelled: 'bg-red-100 text-red-700',
  paid: 'bg-green-100 text-green-700',
  failed: 'bg-red-100 text-red-700',
};
const Badge = ({ label }: { label: string }) => {
    return (
        <span
      className={`rounded-full px-3 py-1 text-sm font-medium ${
        colors[label] ?? 'bg-gray-100 text-gray-700'
      }`}
    >
      {label}
    </span>
    );
};

export default Badge;