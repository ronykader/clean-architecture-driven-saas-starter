import React from 'react';

const Card = ({
  title,
  children,
}: {
  title?: string;
  children: React.ReactNode;
}) => {
    return (
         <div className="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
      {title && <h3 className="mb-4 text-lg font-semibold">{title}</h3>}
      {children}
    </div>
    );
};

export default Card;