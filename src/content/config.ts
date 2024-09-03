import { z, defineCollection } from 'astro:content';

// 2. Define a `type` and `schema` for each collection
const blogCollection = defineCollection({
  type: 'content', 
schema: ({ image }) => z.object({
    title: z.string(),
    logo: image(),
       description: z.string(),
    
  }),
});

const serviceCollection = defineCollection({
type: 'content',
  schema: ({ image }) => z.object({
    title: z.string(),
    image: image(),
    description: z.string(),
  }),
})

// 3. Export a single `collections` object to register your collection(s)
export const collections = {
        'blog': blogCollection,
        'services': serviceCollection
};