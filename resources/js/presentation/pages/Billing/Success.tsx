import { Link } from '@inertiajs/react';
import React from 'react';

const Success = () => {
    return (
        <div className="min-h-screen flex items-center justify-center bg-gradient-to-br from-emerald-50 to-green-100 px-4">
            <div className="w-full max-w-lg rounded-2xl bg-white shadow-xl p-8 text-center">
                <div className="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-emerald-100">
                    <svg
                        className="h-8 w-8 text-emerald-600"
                        fill="none"
                        stroke="currentColor"
                        strokeWidth={2}
                        viewBox="0 0 24 24"
                    >
                        <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            d="M5 13l4 4L19 7"
                        />
                    </svg>
                </div>

                <h1 className="text-2xl font-semibold text-gray-800">
                    Payment Processing
                </h1>

                <p className="mt-3 text-gray-600">
                    Thank you for your purchase. Your payment has been received and
                    is currently being verified.
                </p>

                <div className="mt-6 rounded-lg bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    You will be notified once your subscription is activated.
                </div>

                <div className="mt-8 flex flex-col gap-3">
                    <Link
                        href="/dashboard"
                        className="inline-flex items-center justify-center rounded-lg bg-emerald-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-emerald-700 transition"
                    >
                        Go to Dashboard
                    </Link>

                    <span className="text-xs text-gray-400">
                        You may safely close this page.
                    </span>
                </div>
            </div>
        </div>
    );
};

export default Success;