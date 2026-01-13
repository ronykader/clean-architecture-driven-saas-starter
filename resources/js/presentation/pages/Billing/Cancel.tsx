import { Link } from '@inertiajs/react';
import React from 'react';

const Cancel = () => {
    return (
        <div className="min-h-screen flex items-center justify-center bg-gradient-to-br from-rose-50 to-red-100 px-4">
            <div className="w-full max-w-lg rounded-2xl bg-white shadow-xl p-8 text-center">
                <div className="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-rose-100">
                    <svg
                        className="h-8 w-8 text-rose-600"
                        fill="none"
                        stroke="currentColor"
                        strokeWidth={2}
                        viewBox="0 0 24 24"
                    >
                        <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </div>

                <h1 className="text-2xl font-semibold text-gray-800">
                    Payment Cancelled
                </h1>

                <p className="mt-3 text-gray-600">
                    Your payment process was cancelled. No charges were made to your
                    account.
                </p>

                <div className="mt-6 rounded-lg bg-rose-50 px-4 py-3 text-sm text-rose-700">
                    You can retry the payment at any time.
                </div>

                <div className="mt-8 flex flex-col gap-3">
                    <Link
                        href="/billing/plans"
                        className="inline-flex items-center justify-center rounded-lg bg-rose-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-rose-700 transition"
                    >
                        Back to Plans
                    </Link>

                    <Link
                        href="/support"
                        className="text-sm text-gray-500 hover:text-gray-700 underline"
                    >
                        Need help? Contact support
                    </Link>
                </div>
            </div>
        </div>
    );
};

export default Cancel;