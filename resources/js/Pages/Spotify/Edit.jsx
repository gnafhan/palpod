// resources/js/Pages/Spotify/Edit.jsx
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, useForm } from '@inertiajs/react';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import PrimaryButton from '@/Components/PrimaryButton';
import { Link } from '@inertiajs/react';

export default function Edit({ auth, spotify }) {
    const { data, setData, put, processing, errors } = useForm({
        title: spotify.title || '',
        description: spotify.description || '',
        link: spotify.link || '',
        published_at: spotify.published_at ? new Date(spotify.published_at).toISOString().split('T')[0] : ''
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        put(route('admin.spotify.update', spotify.id));
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Edit Spotify Link</h2>}
        >
            <Head title="Edit Spotify Link" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6">
                            <form onSubmit={handleSubmit}>
                                <div className="mb-4">
                                    <InputLabel htmlFor="title" value="Title" />
                                    <TextInput
                                        id="title"
                                        type="text"
                                        name="title"
                                        value={data.title}
                                        className="mt-1 block w-full"
                                        onChange={e => setData('title', e.target.value)}
                                    />
                                    <InputError message={errors.title} className="mt-2" />
                                </div>

                                <div className="mb-4">
                                    <InputLabel htmlFor="description" value="Description" />
                                    <textarea
                                        id="description"
                                        name="description"
                                        value={data.description}
                                        className="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        rows="4"
                                        onChange={e => setData('description', e.target.value)}
                                    />
                                    <InputError message={errors.description} className="mt-2" />
                                </div>

                                <div className="mb-4">
                                    <InputLabel htmlFor="link" value="Spotify Link" />
                                    <TextInput
                                        id="link"
                                        type="text"
                                        name="link"
                                        value={data.link}
                                        className="mt-1 block w-full"
                                        onChange={e => setData('link', e.target.value)}
                                    />
                                    <InputError message={errors.link} className="mt-2" />
                                </div>

                                <div className="mb-4">
                                    <InputLabel htmlFor="published_at" value="Published At" />
                                    <TextInput
                                        id="published_at"
                                        type="date"
                                        name="published_at"
                                        value={data.published_at}
                                        className="mt-1 block w-full"
                                        onChange={e => setData('published_at', e.target.value)}
                                    />
                                    <InputError message={errors.published_at} className="mt-2" />
                                </div>

                                <div className="flex items-center gap-4">
                                    <PrimaryButton disabled={processing}>Update</PrimaryButton>
                                    <Link
                                        href={route('admin.spotify.index')}
                                        className="text-gray-600 hover:text-gray-900"
                                    >
                                        Cancel
                                    </Link>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}