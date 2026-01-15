import React from 'react';

const Table = ({
  headers,
  children,
}: {
  headers: string[];
  children: React.ReactNode;
}) => {
    return (
        <table className="w-full border-collapse">
      <thead>
        <tr className="border-b">
          {headers.map(h => (
            <th key={h} className="px-3 py-2 text-left text-sm font-semibold">
              {h}
            </th>
          ))}
        </tr>
      </thead>
      <tbody>{children}</tbody>
    </table>
    );
};

export default Table;