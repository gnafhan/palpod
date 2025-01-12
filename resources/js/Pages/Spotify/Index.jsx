// resources/js/Pages/Spotify/Index.jsx
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import formatDate from '@/Util/FormatDate';
import { Head, Link } from '@inertiajs/react';
import { router } from '@inertiajs/react';

export default function Index({ auth, spotifies }) {
    const handleDelete = (id) => {
        if (confirm('Are you sure you want to delete this item?')) {
            router.delete(route('admin.spotify.destroy', id));
        }
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Manage Spotify Links</h2>}
        >
            <Head title="Spotify Links" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="mb-4">
                        <Link
                            href={route('admin.spotify.create')}
                            className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        >
                            Add New Spotify Link
                        </Link>
                    </div>

                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6">
                            <table className="min-w-full divide-y divide-gray-200">
                                <thead className="bg-gray-50">
                                    <tr>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Link</th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Published At</th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody className="bg-white divide-y divide-gray-200">
                                    {spotifies.data.map((spotify) => (
                                        <tr key={spotify.id}>
                                            <td className="px-6 py-4 whitespace-nowrap">{spotify.title}</td>
                                            <td className="px-6 py-4">{spotify.description}</td>
                                            <td className="px-6 py-4">
                                                <a href={spotify.link} target="_blank" rel="noopener noreferrer" className="text-blue-600 hover:text-blue-900">
                                                    {spotify.link}
                                                </a>
                                            </td>
                                            <td className="px-6 py-4 whitespace-nowrap">{formatDate(spotify.published_at)}</td>
                                            <td className="px-6 py-4 whitespace-nowrap">
                                                <Link
                                                    href={route('admin.spotify.edit', spotify.id)}
                                                    className="text-indigo-600 hover:text-indigo-900 mr-4"
                                                >
                                                    Edit
                                                </Link>
                                                <button
                                                    onClick={() => handleDelete(spotify.id)}
                                                    className="text-red-600 hover:text-red-900"
                                                >
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}