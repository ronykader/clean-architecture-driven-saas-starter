import React from 'react';

const Button = ({
  children,
  onClick,
  variant = 'primary',
}: {
  children: React.ReactNode;
  onClick?: () => void;
  variant?: 'primary' | 'danger' | 'secondary';
}) => {
    const styles = {
    primary: 'bg-indigo-600 text-white hover:bg-indigo-700',
    danger: 'bg-red-600 text-white hover:bg-red-700',
    secondary: 'bg-gray-200 text-gray-800 hover:bg-gray-300',
  };
    return (
        <button
      onClick={onClick}
      className={`rounded-lg px-4 py-2 font-medium transition ${styles[variant]}`}
    >
      {children}
    </button>
    );
};

export default Button;